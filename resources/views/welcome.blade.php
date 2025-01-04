
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoJourney</title>
    <link rel="stylesheet" href="{{ asset('/style.css') }}">

</head>
<body>
    <!-- Navbar -->
    <header>
        <nav class="navbar">
            <div class="logo">Eco - Mart</div>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="{{ route('our-story')}}">Our Story</a></li>
                <li><a href="{{ route('login') }}">Our Products</a></li>
                
                <li><a href="{{ route('investors.index')}}">Investors</a></li>
                <li><a href="{{ route('contact-us')}}">Contact Us</a></li>
                {{-- <li><a href="{{ route('submitReview')}}">Cus</a></li> --}}
            </ul>
            <div class="navbar-buttons">
                <a href="{{ route('login') }}" class="cart-btn">🛒</a>
                <a href="{{ route('login') }}">Login</a>  
            </div>
        </nav>
    </header>

    <!-- Banner Section -->
    <section class="banner">
        <div class="banner-content">
            <h1>Welcome to ...
                <br><span>Eco - Mart</span></h1>
            <p>Join us on our journey to sustainability !!!</p>
            {{-- <input type="text" placeholder="Search here ..." class="search-bar"> --}}
            <button class="learn-more">Find more about our company...</button>
        </div>
        <div class="banner-images">
            <img src="/images/download.jpeg" alt="Image 1">
            <img src="/images/images.jpeg" alt="Image 2">
            <img src="/images/images (1).jpeg" alt="Image 3">
        </div>
    </section>

    <!-- Our Company Section -->
<section class="company-section">
    <div class="company-intro">
        <h2>Explore...<br>Our Company,</h2>
        <p>Eco-Mart is dedicated to promoting sustainability by connecting communities with eco-friendly products and ethical businesses. We support local artisans, reduce environmental impact, and empower communities through fair trade and sustainable practices. Our mission is to inspire positive change while preserving natural resources, fostering growth, and promoting eco-conscious living in Sri Lanka.</p>
    </div>
    
    <div class="company-cards">
        <!-- Card 1 Linked to Our Story -->
        <a href="{{ route('our-story') }}" class="card" style="text-decoration: none; color: inherit;">
            <img src="/images/images (2).jpeg" alt="Our Story">
            <h3>Our Story .....</h3>
            <p>Learn about our company and how we positively impact our country.</p>
        </a>

        <!-- Card 2 Linked to About Us -->
        <a href="{{ route('contact-us')}}" class="card" style="text-decoration: none; color: inherit;">
            <img src="/images/images (3).jpeg" alt="Sustainability">
            <h3>Contact us</h3>
            <p>Find out about our sustainable products and our environment and community.</p>
        </a>
    </div>
</section>


   <!-- Our Products Section -->
<section class="products-section">
    <div class="product-content">
        <img src="/images/food.png" alt="Products" class="product-image">
        <div class="product-text">
            <h2>Join Us in Creating Impact</h2>
            <a href="{{ route('investors.index') }}" class="explore-btn" 
               style="text-decoration: none; background-color: #28a745; color: white; padding: 12px 20px; border-radius: 5px; font-size: 1.2rem; cursor: pointer; transition: background-color 0.3s ease;">
               Become an Investor
            </a>
        </div>
    </div>
</section>


    <!-- Our Services Section -->
    <section class="services-section">
        <h2>Our Services</h2>
        <div class="services-container">
            <!-- Service 1 -->
            <div class="service-card">
                <img src="images/images (4).jpeg" alt="Service 1 Icon">
                <h3>Sustainable Sourcing</h3>
                <p>Ensuring that all our products meet strict sustainability standards.</p>
            </div>
            <!-- Service 2 -->
            <div class="service-card">
                <img src="images/product-certification-marks.jpg" alt="Service 2 Icon">
                <h3>Product Certifications</h3>
                <p>Our products are certified to help consumers make responsible choices.</p>
            </div>
            <!-- Service 3 -->
            <div class="service-card">
                <img src="images/download (1).jpeg" alt="Service 3 Icon">
                <h3>Eco-Friendly Packaging</h3>
                <p>Using only environmentally safe and biodegradable packaging materials.</p>
            </div>
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

  