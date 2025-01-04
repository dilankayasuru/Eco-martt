<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <link rel="stylesheet" href="{{ asset('/style.css') }}">
</head>
<body>

    <!-- Navbar -->
    <header>
        <nav class="navbar">
            <div class="logo">Eco - Mart</div>
            <ul class="nav-links">
                <li><a href="">Home</a></li>
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
    

    
    <!-- Banner Section -->
    <section class="banner">
        <div class="banner-content">
            <h1 style="font-size: 35px">Welcome to the ...
                <br><span>Eco - Mart</span></h1>
            <h1 style="font-size: 65px">Hello, {{ Auth::user()->name }}</h1>
        </div>
        <div class="banner-images">
            <img src="/images/download.jpeg" alt="Image 1">
            <img src="/images/images.jpeg" alt="Image 2">
            <img src="/images/images (1).jpeg" alt="Image 3">
        </div>
    </section>

     <!-- Footer Section -->
     <footer class="footer">
        <div class="footer-content">
            <!-- Company Info -->
            <div class="footer-section company-info">
                <h2 class="company-logo">Eco - Mart</h2>
                <p>Contact</p>
                <p>E-Mail: ecomart@gmail.com</p>
                <p>Hotline: +94 11 123 4567</p>
            </div>

            <!-- Navigation Links -->
            <div class="footer-section links">
                <p>Home</p>
                <p>Our Story</p>
                <p>Our Products</p>
                <p>Sustainability</p>
                <p>Contact Us</p>
            </div>

            <!-- Account Links -->
            <div class="footer-section account">
                <p>Sign in</p>
                <p>View Cart</p>
                <p>Track my Order</p>
                <p>Help</p>
                <p>Responsibilities</p>
            </div>

            <!-- Social Media Links -->
            <div class="footer-section social-media">
                <p>Connect with us</p>
                <div class="social-icons">
                    <img src="images/download (1).png" alt="Facebook">
                    <img src="images/download (3).jpeg" alt="Instagram">
                    <img src="images/twitter.png" alt="Twitter">
                    <img src="images/download (2).jpeg" alt="WhatsApp">
                </div>
            </div>
        </div>
    </footer>
    
</body>
</html>
