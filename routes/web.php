<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerRegistrationController;
use App\Http\Controllers\SupplierRegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SupplierDashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SupplierController;







// Home route

Route::get('/', function () {
    return view('welcome');
})->name('home');

//Our story route
Route::get('/our-story', function () {
    return view('our-story');
})->name('our-story');

// Registration routes

Route::get('/register/customer', [CustomerRegistrationController::class, 'showForm'])->name('register.customer.form');
Route::post('/register/customer', [CustomerRegistrationController::class, 'register'])->name('register.customer');

Route::get('/register/supplier', [SupplierRegistrationController::class, 'showForm'])->name('register.supplier.form');
Route::post('/register/supplier', [SupplierRegistrationController::class, 'register'])->name('register.supplier');


// Login routes
Route::get('/login', [LoginController::class, 'showForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard routes
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/supplier/dashboard', function () {
    return view('supplier.dashboard');
})->name('supplier.dashboard');

Route::get('/customer/dashboard', function () {
    return view('customer.dashboard');
})->name('customer.dashboard');


// Supplier Dashboard routes

Route::middleware(['auth'])->group(function () {
    Route::get('/supplier/dashboard', [SupplierDashboardController::class, 'index'])->name('supplier.dashboard');


    Route::get('/supplier/add-product', [SupplierDashboardController::class, 'addProduct'])->name('supplier.add-product');

    
    // Show the profile page
    Route::get('/supplier/profile', [SupplierDashboardController::class, 'showProfile'])->name('supplier.profile');

    // Handle profile updates
    Route::post('/supplier/profile', [SupplierDashboardController::class, 'updateProfile'])->name('supplier.profile.update');

});

// Customer Dashboard routes

Route::middleware(['auth'])->group(function () {
    Route::get('/customer/profile', [CustomerController::class, 'show'])->name('customer.profile');
    Route::post('/customer/profile/update/{id}', [CustomerController::class, 'update'])->name('customer.profile.update');
    Route::post('/customer/profile/password', [CustomerController::class, 'updatePassword'])->name('customer.profile.password.update');
});


// Products routes

// Display the Add Product form
Route::get('/supplier/products/create', [ProductController::class, 'create'])->name('supplier.products.create');

// Store the product in the database
Route::post('/supplier/products/store', [ProductController::class, 'store'])->name('supplier.products.store');

// Fetch products for the supplier dashboard
Route::get('/supplier/dashboard', [ProductController::class, 'index'])->name('supplier.dashboard');

// Edit a product
Route::get('/supplier/products/edit/{id}', [ProductController::class, 'edit'])->name('supplier.products.edit');
Route::post('/supplier/products/update/{id}', [ProductController::class, 'update'])->name('supplier.products.update');

// Delete a product
Route::post('/supplier/products/delete/{id}', [ProductController::class, 'destroy'])->name('supplier.products.delete');


Route::get('/products', [ProductController::class, 'showProductsByCategory'])->name('products.index');


// Product Details Route
Route::get('products/{id}', [ProductController::class, 'show'])->name('products.show');

// Add to Cart Route
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [CartController::class, 'showCheckout'])->name('checkout.show');
Route::post('/checkout', [CartController::class, 'processCheckout'])->name('checkout.process');

// Orders routes

Route::middleware('auth')->group(function () {
    // Customer Routes
    Route::post('/checkout', [OrderController::class, 'processCheckout'])->name('checkout.process');
    Route::get('/orders', [OrderController::class, 'customerOrders'])->name('orders.index');

    // Supplier Routes
    Route::get('/supplier/orders', [OrderController::class, 'supplierOrders'])->name('supplier.orders.index');
    Route::post('/supplier/orders/{order}/confirm', [OrderController::class, 'confirmOrder'])->name('supplier.orders.confirm');
    Route::patch('/supplier/orders/{order}', [SupplierController::class, 'updateOrderStatus'])->name('supplier.orders.update');

});
Route::get('/checkout/success', [OrderController::class, 'success'])->name('checkout.success');
Route::get('/checkout/cancel', [OrderController::class, 'cancel'])->name('checkout.cancel');

// Reviews routes

use App\Http\Controllers\ReviewController;

Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

// Vouchers routes

Route::get('/vouchers', [VoucherController::class, 'index'])->name('vouchers.index');
Route::get('/vouchers/create', [VoucherController::class, 'create'])->name('vouchers.create');
Route::post('/vouchers', [VoucherController::class, 'store'])->name('vouchers.store');

// Investors routes
use App\Http\Controllers\InvestorController;

Route::get('/investors', [InvestorController::class, 'index'])->name('investors.index');
Route::post('/investors', [InvestorController::class, 'store'])->name('investors.store');

//contact us route
Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');

Route::get('/admin/analytics', [AdminController::class, 'analytics'])->name('admin.analytics');
Route::delete('/admin/users/{id}', [AdminController::class, 'destroy'])->name('admin.user.destroy');
Route::patch('/admin/suppliers/{id}/approve', [AdminController::class, 'approveSupplier'])->name('admin.supplier.approve');

Route::get('/supplier/pending', function () {
    return view('auth.supplier_pending');
})->name('supplier.pending');