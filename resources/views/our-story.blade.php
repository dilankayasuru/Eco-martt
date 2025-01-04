<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Story - Eco-Mart</title>
</head>
<style>


/* Navbar styling */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1em 2em;
    background-color: #28a745; /* Green background */
    position: fixed; /* Fix the navbar at the top */
    top: 0; /* Position it at the very top */
    width: 97%; /* Make the navbar span the full width of the page */
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
    
<body style=" margin: 0; padding: 0; color: #333; background-color: #f8f9fa;">

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
  

    <!-- Image Slider -->
    <section style="position: relative; overflow: hidden; height: 60vh; margin-top:85px;">
        <div id="slider" style="display: flex; transition: transform 0.5s ease-in-out;">
            <div style="flex: 0 0 100%; position: relative;">
                <img src="/images/5522-1024x683.jpg" alt="Slide 1" style="width: 100%; height: 100%; object-fit: cover;">
                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white;">

                </div>
            </div>
            <div style="flex: 0 0 100%; position: relative;">
                <img src="/images/images (3).jpeg" alt="Slide 2" style="width: 100%; height: 100%; object-fit: cover;">
                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white;">    
                </div>
            </div>
            <div style="flex: 0 0 100%; position: relative;">
                <img src="/images/5522-1024x683.jpg" alt="Slide 3" style="width: 100%; height: 100%; object-fit: cover;">
                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white;">
                </div>
            </div>
        </div>
        <button id="prevBtn" style="position: absolute; top: 50%; left: 10px; transform: translateY(-50%); background: rgba(0,0,0,0.5); color: white; border: none; padding: 10px; cursor: pointer;">&#8249;</button>
        <button id="nextBtn" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); background: rgba(0,0,0,0.5); color: white; border: none; padding: 10px; cursor: pointer;">&#8250;</button>
    </section>

       <!-- Our Story Section -->
       <section style="padding: 40px; background-color: #fff;">
        <div style="display: flex; align-items: center; gap: 20px;">
            <div style="flex: 1;">
                <h2 style="font-size: 2.5rem; color: #28a745; margin-bottom: 20px;">Our Story</h2>
                <p style="font-size: 1.2rem; line-height: 1.8; margin-bottom: 20px;">
                    Eco-Mart was founded with a vision to connect communities through sustainable practices and products.
                    From our humble beginnings in 2015, we have grown into a community-driven platform that empowers local businesses and promotes eco-friendly living.
                </p>
                <h3 style="font-size: 2rem; color: #333;">Our Mission</h3>
                <p style="font-size: 1.2rem; line-height: 1.8; margin-bottom: 20px;">
                    We strive to inspire sustainable choices in everyday life by offering environmentally conscious products and services.
                </p>
                <h3 style="font-size: 2rem; color: #333;">Our Values</h3>
                <ul style="font-size: 1.2rem; line-height: 1.8; list-style-type: square;">
                    <li>Empowering Communities</li>
                    <li>Reducing Environmental Impact</li>
                    <li>Promoting Ethical Business Practices</li>
                </ul>
            </div>
            <div style="flex: 1;">
                <img src="/images/5522-1024x683.jpg" alt="Eco-Mart Story" style="width: 100%; height: auto; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
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
    

    <!-- JavaScript for Slider -->
    <script>
        const slider = document.getElementById('slider');
        const slides = slider.children;
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        let index = 0;

        function showSlide(newIndex) {
            index = (newIndex + slides.length) % slides.length; // Loop slides
            slider.style.transform = `translateX(-${index * 100}%)`;
        }

        prevBtn.addEventListener('click', () => showSlide(index - 1));
        nextBtn.addEventListener('click', () => showSlide(index + 1));

        setInterval(() => showSlide(index + 1), 6000); // Auto-slide
    </script>
</body>
</html>
