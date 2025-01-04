<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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

/* Navbar styling */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1em 2em;
    background-color: #28a745; /* Green background */
    position: fixed; /* Fix the navbar at the top */
    top: 0; /* Position it at the very top */
    width: 95%; /* Make the navbar span the full width of the page */
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

       
    </style>
</head>
<body>

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
    <br><br><br><br>
    
    <div style="background: #fff; padding: 40px; border-radius: 12px; box-shadow: 0 6px 12px rgba(0,0,0,0.6); max-width: 800px; width: 100%;">
        <h1 style="text-align: center; font-size: 36px; color: #333; margin-bottom: 30px;">Get in Touch</h1>

        <div style="margin-bottom: 30px;">
            <h2 style="font-size: 28px; color: #4CAF50; margin-bottom: 10px;">Social Media</h2>
            <p style="font-size: 18px; color: #555;">
                <a href="#" style="color: #4CAF50; font-size: 20px; margin-right: 20px; text-decoration: none; transition: all 0.3s ease;" id="facebook">Facebook</a>
                <a href="#" style="color: #4CAF50; font-size: 20px; margin-right: 20px; text-decoration: none; transition: all 0.3s ease;" id="twitter">Twitter</a>
                <a href="#" style="color: #4CAF50; font-size: 20px; margin-right: 20px; text-decoration: none; transition: all 0.3s ease;" id="instagram">Instagram</a>
                <a href="#" style="color: #4CAF50; font-size: 20px; margin-right: 20px; text-decoration: none; transition: all 0.3s ease;" id="linkedin">LinkedIn</a>
            </p>
        </div>

        <div style="margin-bottom: 30px;">
            <h2 style="font-size: 28px; color: #4CAF50; margin-bottom: 10px;">Contact Information</h2>
            <p style="font-size: 18px; color: #555;">Email: contact@yourwebsite.com</p>
            <p style="font-size: 18px; color: #555;">Phone: +123 456 7890</p>
            <p style="font-size: 18px; color: #555;">Address: 123 Main Street, Your City, Country</p>
        </div>

        <div style="margin-bottom: 30px;">
            <h2 style="font-size: 28px; color: #4CAF50; margin-bottom: 10px;">Business Hours</h2>
            <p style="font-size: 18px; color: #555;">Monday - Friday: 9:00 AM - 6:00 PM</p>
            <p style="font-size: 18px; color: #555;">Saturday: 10:00 AM - 4:00 PM</p>
            <p style="font-size: 18px; color: #555;">Sunday: Closed</p>
        </div>

        <div style="margin-bottom: 30px;">
            <h2 style="font-size: 28px; color: #4CAF50; margin-bottom: 10px;">Support Services</h2>
            <p style="font-size: 18px; color: #555;">Technical Support: support@yourwebsite.com</p>
            <p style="font-size: 18px; color: #555;">Sales Inquiries: sales@yourwebsite.com</p>
        </div>

        <div style="margin-bottom: 30px;">
            <h2 style="font-size: 28px; color: #4CAF50; margin-bottom: 10px;">Careers</h2>
            <p style="font-size: 18px; color: #555;">Interested in working with us? Email your resume to careers@yourwebsite.com</p>
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
