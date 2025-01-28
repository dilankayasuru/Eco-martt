<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function create()
    {
        // Pass categories to the view
        $categories = ['Vegetables', 'Fruits', 'Seafood', 'Grains', 'Dairy']; 
        return view('supplier.add-product', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the form inputs
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'product_certification' => 'nullable|string|max:255',
            'product_certification_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Handle product certification image upload
        if ($request->hasFile('product_certification_image')) {
            $certificationImagePath = $request->file('product_certification_image')->store('product_certifications', 'public');
            $validatedData['product_certification_image'] = $certificationImagePath;
        }

        // Add supplier ID to the product (assuming authenticated user is the supplier)
        $validatedData['supplier_id'] = auth()->id();

        // Save the product to the database
        Product::create($validatedData);

        return redirect()->route('supplier.dashboard')->with('success', 'Product added successfully!');
    }

    // Fetch products for the supplier dashboard
    public function index()
    {
        $products = Product::where('supplier_id', auth()->id())->get();
        return view('supplier.dashboard', compact('products'));
    }

    // Show the form to edit a product
    public function edit($id)
    {
        $product = Product::where('supplier_id', auth()->id())->findOrFail($id);
        $categories = ['Vegetables', 'Fruits', 'Seafood', 'Grains', 'Dairy'];
        return view('supplier.edit-product', compact('product', 'categories'));
    }

    // Update the product
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'product_certification' => 'nullable|string|max:255',
            'product_certification_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $product = Product::where('supplier_id', auth()->id())->findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validatedData['image'] = $imagePath;
        }

        if ($request->hasFile('product_certification_image')) {
            $certificationImagePath = $request->file('product_certification_image')->store('product_certifications', 'public');
            $validatedData['product_certification_image'] = $certificationImagePath;
        }

        $product->update($validatedData);

        return redirect()->route('supplier.dashboard')->with('success', 'Product updated successfully!');
    }

    // Delete the product
    public function destroy($id)
    {
        $product = Product::where('supplier_id', auth()->id())->findOrFail($id);
        $product->delete();

        return redirect()->route('supplier.dashboard')->with('success', 'Product deleted successfully!');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('customer.products.show', compact('product'));
    }

    public function showProductsByCategory()
    {
        // Fetch all products grouped by category
        $categories = Product::select('category')->distinct()->pluck('category');

        $productsByCategory = [];
        foreach ($categories as $category) {
            $productsByCategory[$category] = Product::where('category', $category)->get();
        }

        return view('customer.products.index', compact('productsByCategory'));
    }


}

