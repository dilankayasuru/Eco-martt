<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Products</title>
    <link rel="stylesheet" href="{{ asset('/products.css') }}">
</head>
<style>
     body {
            margin: 0;
            padding: 0;
            color: #333;
            background-image: url('{{ asset('images/bg3.jpg') }}');
            background-size: cover;   
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
</style>
<body>
   
     <!-- Navbar -->
     <header>
        <nav class="navbar">
            <div class="logo">Eco - Mart</div>
            <ul class="nav-links">
                <li><a href="{{ route('customer.dashboard')}}">Home</a></li>
                <li><a href="{{ route('customer.profile') }}">My Profile</a></li>
                <li><a href="{{ route('products.index')}}">Products</a></li>
                <li><a href="{{ route('reviews.index') }}">Customer Support</a></li>
                <li><a href="{{ route('orders.index')}}">My Orders</a></li>

   
            </ul>
            <div class="navbar-buttons">    
                <a href="{{ route('cart.show')}}" class="cart-btn">🛒</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </nav>
    </header>
<br><br><br><br>
    
    <!-- Products Section -->
    <div class="container" style="max-width: 1200px; margin: 2em auto; padding: 0 1em;">
        @foreach($productsByCategory as $category => $products)
        <section class="category-section" style="margin-bottom: 2em;">
            <h2 class="category-title" style="color: #28a745; font-size: 1.8rem; border-bottom: 2px solid #ddd; padding-bottom: 0.5em; margin-bottom: 1em;">{{ $category }}</h2>
            <div class="product-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5em;">
                @foreach($products as $product)
                <div class="product-card" style="background-color: #fff; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); padding: 1em; text-align: center;">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-image" style="max-width: 100%; border-radius: 5px; margin-bottom: 1em;">
                    <div class="product-info">
                        <h3 class="product-name" style="font-size: 1.2rem; font-weight: bold; margin-bottom: 0.5em;">{{ $product->name }}</h3>
                        <p class="product-price" style="color: #28a745; font-weight: bold; margin-bottom: 0.5em;">Price: Rs.{{ number_format($product->price, 2) }}</p>
                        <p class="product-quantity" style="color: #555; margin-bottom: 1em;">Available: {{ $product->quantity }}</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary" style="text-decoration: none; color: #fff; background-color: #2e681e; padding: 10px 20px; border-radius: 5px; transition: background-color 0.3s;">
                            View Details
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endforeach
    </div>

</body>
</html>
