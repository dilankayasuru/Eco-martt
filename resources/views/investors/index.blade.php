<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join as an Investor</title>
</head>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Navbar styling */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1em 2em;
    background-color: #28a745; /* Green background */
    position: fixed; /* Fix the navbar at the top */
    top: 0; /* Position it at the very top */
    width: 100%; /* Make the navbar span the full width of the page */
    z-index: 1000; /* Ensure it stays above other elements */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Optional: Add a subtle shadow for a professional look */
    
}

.navbar .logo {
    color: white;
    font-size: 2.3rem;
    font-weight: bold;
}

.navbar .nav-links {
    list-style: none;
    display: flex;
    gap: 3em;
}

.navbar .nav-links a {
    color: white;
    text-decoration: none;
    font-weight: bold;
    font-size: 20px;
}

.navbar-buttons {
    display: flex;
    gap: 1em;
}

.navbar-buttons a {
    color: white;
    text-decoration: none;
    font-weight: bold;
    font-size: 20px;
}

 .submit {
    color: white;
    text-decoration: none;
    font-weight: bold;
    font-size: 20px;
}

.cart-btn,
.login-btn {
    color: white;
    text-decoration: none;
    font-weight: bold;
    font-size: 20px;
}

.navbar-buttons form button {
    padding: 10px 20px;
    background-color: #e74c3c; /* Red logout button */
    border: none;
    color: #fff;
    font-size: 14px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.navbar-buttons form button:hover {
    background-color: #c0392b; /* Darker red on hover */
}


/* Footer Styling */
.footer {
    background-color: #000000; /* Green background */
    color: #fff;
    padding: 30px;
    margin-top: 0px;
}

.footer-content {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
    gap: 60px;
}

.footer-section {
    flex: 1;
    min-width: 180px;
}

.company-info h2 {
    font-size: 44px;
    font-weight: bold;
    margin-bottom: 20px;
    color: #21f625;
}

.footer-section p {
    margin: 15px 0;
    font-size: 16px;
}

.social-media {
    text-align: left;
}

.social-media .social-icons {
    display: flex;
    gap: 10px;
    margin-top: 10px;
}

.social-media .social-icons img {
    width: 34px;
    height: 34px;
    cursor: pointer;
}

/* Responsive Design */
@media (max-width: 768px) {
    .footer-content {
        flex-direction: column;
        align-items: flex-start;
    }
}
</style>

<body style=" background-color: #f8f9fa; margin: 0; padding: 0;">

  <!-- Navbar -->
  <header>
    <nav class="navbar">
        <div class="logo">Eco - Mart</div>
        <ul class="nav-links">
            <li><a href="{{ route('home')}}">Home</a></li>
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

<!-- Hero Section -->
<section style="
    background: linear-gradient(
        rgba(0, 0, 0, 0.5), 
        rgba(0, 0, 0, 0.5)
      ),
      url('/images/beelong.jpg') no-repeat center center/cover; 
    height: 60vh; 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    color: white; 
    text-align: center;
">
    <h2 style="font-size: 5rem; text-shadow: 2px 2px 6px rgba(0,0,0,0.7);">
        Join as an Investor
    </h2>
</section>

</section>

<!-- Why Join Us Section -->
<section style="background: linear-gradient(to bottom, #e8f5e9, #f1f8e9); padding: 50px 20px;">
    <h2 style="text-align: center; font-size: 2.5rem; color: #28a745;">Why Join Us?</h2>
    <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 30px; margin-top: 30px;">
        <div style="background: white; padding: 20px; width: 300px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); text-align: center;">
            <img src="/images/beelong.jpg" alt="Partnership" style="width: 100%; height: auto; border-radius: 8px;">
            <h3 style="color: #333; margin-top: 15px;">Strong Partnerships</h3>
            <p style="color: #555;">Collaborate with a market-leading eco-friendly company for sustainable growth.</p>
        </div>

        <div style="background: white; padding: 20px; width: 300px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); text-align: center;">
            <img src="/images/beelong.jpg" alt="Eco Growth" style="width: 100%; height: auto; border-radius: 8px;">
            <h3 style="color: #333; margin-top: 15px;">Eco-Friendly Future</h3>
            <p style="color: #555;">Be part of a mission-driven company that prioritizes sustainability and the environment.</p>
        </div>

        <div style="background: white; padding: 20px; width: 300px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); text-align: center;">
            <img src="/images/beelong.jpg" alt="Profits" style="width: 100%; height: auto; border-radius: 8px;">
            <h3 style="color: #333; margin-top: 15px;">Profit & Impact</h3>
            <p style="color: #555;">Achieve financial returns while supporting environmentally conscious initiatives.</p>
        </div>

        <div style="background: white; padding: 20px; width: 300px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); text-align: center;">
            <img src="/images/beelong.jpg" alt="Community" style="width: 100%; height: auto; border-radius: 8px;">
            <h3 style="color: #333; margin-top: 15px;">Community Impact</h3>
            <p style="color: #555;">Support local communities and make a positive impact on society.</p>
    </div>
</section>

<!-- Investor Form Section -->
<div style="max-width: 1200px; margin: 40px auto; padding: 40px; background: white; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
    <h2 style="text-align: center; font-size: 2.5rem; color: #28a745;">Join Our Network</h2>

    @if(session('success'))
        <div style="background-color: #d4edda; padding: 15px; margin-bottom: 20px; border: 1px solid #c3e6cb; color: #155724;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('investors.store') }}" method="POST" enctype="multipart/form-data" style="margin-top: 30px;">
        @csrf
        <div style="margin-bottom: 20px;">
            <label for="name" style="font-weight: bold; display: block; margin-bottom: 5px;">Investor Name:</label>
            <input type="text" id="name" name="name" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="email" style="font-weight: bold; display: block; margin-bottom: 5px;">Email Address:</label>
            <input type="email" id="email" name="email" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        {{-- <div style="margin-bottom: 20px;">
            <label for="logo" style="font-weight: bold; display: block; margin-bottom: 5px;">Logo:</label>
            <input type="file" id="logo" name="logo" style="padding: 5px;">
        </div> --}}

        <div style="margin-bottom: 20px;">
            <label for="purpose" style="font-weight: bold; display: block; margin-bottom: 5px;">Purpose:</label>
            <textarea id="purpose" name="purpose" rows="4" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"></textarea>
        </div>

        <button type="submit" style="background: #28a745; color: white; padding: 12px 20px; border: none; border-radius: 5px; font-size: 1.2rem; cursor: pointer;">
            Submit
        </button>
    </form>
</div>

<!-- Display Existing Investors Section -->
<div style="padding: 40px; background: #f8f9fa;">
    <h2 style="text-align: center; font-size: 2.5rem; color: #28a745;">Our Investors</h2>
    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 30px; margin-top: 20px;">
        @forelse($investors as $investor)
            <div style="background: white; padding: 20px; border-radius: 8px; width: 300px; text-align: center; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                {{-- <img src="{{ asset('storage/' . $investor->logo) }}" alt="{{ $investor->name }}" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover;"> --}}
                <h3 style="margin-top: 15px; font-size: 1.5rem;">{{ $investor->name }}</h3>
                <p style="color: #555;">{{ $investor->purpose }}</p>
            </div>
        @empty
            <p style="text-align: center; color: #777; font-size: 1.2rem;">No investors yet. Be the first to join us!</p>
        @endforelse
    </div>
</div>

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
