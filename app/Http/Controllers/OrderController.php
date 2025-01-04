<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class OrderController extends Controller
{
    public function processCheckout(Request $request)
    {
        $cart = session()->get('cart', []);

        // Ensure the cart is not empty
        if (empty($cart)) {
            return redirect()->route('cart.show')->with('error', 'Your cart is empty.');
        }

        // Validate the form data
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'contact_no' => 'required|string|max:15',
            'email' => 'required|email|max:255',
        ]);

        // Calculate the total amount and apply discount if applicable
        $totalAmount = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $discount = $totalAmount > 3000 ? $totalAmount * 0.10 : 0;
        $payableAmount = $totalAmount - $discount;


        // Save the order in the database
        $order = Order::create([
            'user_id' => auth()->id(),
            'full_name' => $validated['full_name'],
            'address' => $validated['address'],
            'contact_no' => $validated['contact_no'],
            'email' => $validated['email'],
            'payment_method' => 'cash_on_delivery',
            'status' => 'pending',
            'total_amount' => $payableAmount,
        ]);

        // Save the order items
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Clear the cart session
        session()->forget('cart');

            // Create Stripe Checkout Session
        $lineItems = [];
        foreach ($cart as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'lkr',
                    'product_data' => [
                        'name' => $item['name'],
                    ],
                    'unit_amount' => $item['price'] * 100, // Amount in cents
                ],
                'quantity' => $item['quantity'],
            ];
        }

        $checkoutSession = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout.cancel'),
        ]);

    // Redirect to Stripe's payment page
    return redirect($checkoutSession->url);
}
    // Fetch Customer Orders
    public function customerOrders()
    {
        $orders = auth()->user()->orders()->with('orderItems.product')->get();

        return view('orders.customer', compact('orders'));
    }

    // Fetch Supplier Orders
    public function supplierOrders()
    {
        $orders = Order::whereHas('orderItems.product', function ($query) {
            $query->where('supplier_id', auth()->id());
        })->with('orderItems.product')->get();

        return view('orders.supplier', compact('orders'));
    }

    // Confirm Supplier Order
    public function confirmOrder(Order $order)
    {
        $order->update(['status' => 'confirmed']);

        return redirect()->route('supplier.orders.index')->with('success', 'Order confirmed successfully.');
    }

    public function success()
    {
        return view('customer.success');
    }

    public function cancel()
    {
        return redirect()->route('cart.show')->with('error', 'Payment was cancelled.');
    }
   
}
