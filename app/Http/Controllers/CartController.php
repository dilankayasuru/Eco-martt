<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Add a product to the cart
     */
    public function add(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($validated['product_id']);

        // Check stock availability
        if ($validated['quantity'] > $product->quantity) {
            return back()->with('error', 'Insufficient stock available.');
        }

        // Add product to the cart (using session)
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $validated['quantity'];
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $validated['quantity'],
                'image' => $product->image,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.show')->with('success', 'Product added to cart successfully!');
    }

    /**
     * Show the cart
     */
    public function show()
    {
        $cart = session()->get('cart', []);

        // Calculate total and apply discount if applicable
        $totalAmount = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $discount = $totalAmount > 3000 ? $totalAmount * 0.10 : 0;
        $payableAmount = $totalAmount - $discount;

        return view('customer.cart', compact('cart', 'totalAmount', 'discount', 'payableAmount'));
    }

    /**
     * Update product quantity in the cart
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $product = Product::findOrFail($id);

            // Check stock availability
            if ($validated['quantity'] > $product->quantity) {
                return back()->with('error', 'Insufficient stock available.');
            }

            // Update cart quantity
            $cart[$id]['quantity'] = $validated['quantity'];
            session()->put('cart', $cart);

            // Update product stock
            $product->quantity -= $validated['quantity'];
            $product->save();

            return redirect()->route('cart.show')->with('success', 'Cart updated successfully!');
        }

        return redirect()->route('cart.show')->with('error', 'Product not found in cart.');
    }

    /**
     * Remove a product from the cart
     */
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $product = Product::findOrFail($id);

            // Restore product stock
            $product->quantity += $cart[$id]['quantity'];
            $product->save();

            // Remove product from cart
            unset($cart[$id]);
            session()->put('cart', $cart);

            return redirect()->route('cart.show')->with('success', 'Product removed and stock restored successfully!');
        }

        return redirect()->route('cart.show')->with('error', 'Product not found in cart.');
    }

    /**
     * Show checkout page
     */
    public function showCheckout()
{
    $cart = session()->get('cart', []); // Get cart from session

    // Calculate total amount
    $totalAmount = array_sum(array_map(function ($item) {
        return $item['price'] * $item['quantity'];
    }, $cart));

    // Apply discount if applicable
    $discount = $totalAmount > 3000 ? $totalAmount * 0.10 : 0;
    $payableAmount = $totalAmount - $discount;

    // Pass cart, discount, and payable amount to the checkout view
    return view('checkout', compact('cart', 'totalAmount', 'discount', 'payableAmount'));
}


    /**
     * Process the checkout
     */
    public function processCheckout(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact_no' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'payment_method' => 'required|in:cash_on_delivery,credit_card,bank_transfer',
        ]);

        $cart = session()->get('cart', []);

        // Calculate the total amount
        $totalAmount = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        // Apply discount if applicable
        $discount = $totalAmount > 3000 ? $totalAmount * 0.10 : 0;
        $payableAmount = $totalAmount - $discount;

        // Create the order
        $order = Order::create([
            'user_id' => Auth::id(),
            'full_name' => $validated['full_name'],
            'address' => $validated['address'],
            'contact_no' => $validated['contact_no'],
            'email' => $validated['email'],
            'payment_method' => $validated['payment_method'],
            'total_amount' => $payableAmount,
            'status' => 'pending',
        ]);

        // Add each product to the order
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // Clear the cart
        session()->forget('cart');

        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }
}
