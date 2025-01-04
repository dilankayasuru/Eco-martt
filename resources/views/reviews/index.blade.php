<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support and Reviews</title>
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

        /* Navbar styling */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1em 2em;
    background-color: #28a745; /* Green background */
    position: fixed; /* Fix the navbar at the top */
    top: 0; /* Position it at the very top */
    width: 96%; /* Make the navbar span the full width of the page */
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
</head>
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
    <br><br><br><br><br>

    <!-- FAQ Section -->
<div class="container faq-section" 
style="max-width: 800px; margin: 2em auto; padding: 1.5em; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); font-family: Arial, sans-serif; color: #333;">
<h1 style="text-align: center; font-size: 2rem; color: #28a745; margin-bottom: 1em;">Frequently Asked Questions</h1>
<div class="faq-item" style="margin-bottom: 1em;">
    <button onclick="toggleFAQ(this)" 
        style="width: 100%; text-align: left; background: #f8f9fa; border: 1px solid #ddd; padding: 0.8em; font-size: 1rem; font-weight: bold; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease;">
        What are your support hours?
    </button>
    <div class="faq-answer" style="display: none; padding: 1em; background-color: #f0f0f0; border-left: 4px solid #28a745; margin-top: 0.5em;">
        We are available Monday to Friday from 9 AM to 6 PM.
    </div>
</div>
<div class="faq-item" style="margin-bottom: 1em;">
    <button onclick="toggleFAQ(this)" 
        style="width: 100%; text-align: left; background: #f8f9fa; border: 1px solid #ddd; padding: 0.8em; font-size: 1rem; font-weight: bold; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease;">
        How can I track my order?
    </button>
    <div class="faq-answer" style="display: none; padding: 1em; background-color: #f0f0f0; border-left: 4px solid #28a745; margin-top: 0.5em;">
        You can track your order using the tracking link sent to your email.
    </div>
</div>
<div class="faq-item" style="margin-bottom: 1em;">
    <button onclick="toggleFAQ(this)" 
        style="width: 100%; text-align: left; background: #f8f9fa; border: 1px solid #dddddd; padding: 0.8em; font-size: 1rem; font-weight: bold; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease;">
        Do you offer international shipping?
    </button>
    <div class="faq-answer" style="display: none; padding: 1em; background-color: #f4eaea; border-left: 4px solid #28a745; margin-top: 0.5em;">
        No, we are not offer international shipping to countries.
    </div>
</div>
</div>

<!-- Customer Reviews Section -->
<div class="container review-section" 
style="max-width: 900px; margin: 2em auto; padding: 1.5em; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); font-family: Arial, sans-serif; color: #333;">
<h2 style="text-align: center; font-size: 1.8rem; color: #007bff; margin-bottom: 1em;">Customer Reviews</h2>

@if(session('success'))
    <div class="alert-success" 
        style="background-color: #d4edda; color: #155724; padding: 1em; border: 1px solid #c3e6cb; border-radius: 5px; margin-bottom: 1em;">
        {{ session('success') }}
    </div>
@endif

<!-- Review Form -->
<form action="{{ route('reviews.store') }}" method="POST" 
    style="margin-bottom: 2em; padding: 1em; background-color: #f8f9fa; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);">
    @csrf
    <div class="form-group" style="margin-bottom: 1em;">
        <label for="rating" style="font-weight: bold; display: block; margin-bottom: 0.5em;">Rating (1-5):</label>
        <input type="number" name="rating" id="rating" min="1" max="5" required 
            style="width: 97%; padding: 0.8em; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
    </div>
    <div class="form-group" style="margin-bottom: 1em;">
        <label for="review" style="font-weight: bold; display: block; margin-bottom: 0.5em;">Your Review:</label>
        <textarea name="review" id="review" rows="4" required 
            style="width: 97%; padding: 0.8em; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;"></textarea>
    </div>
    <div class="form-group" style="text-align: center;">
        <button type="submit" 
            style="background-color: #28a745; color: white; padding: 0.8em 2em; font-size: 1rem; font-weight: bold; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease;">
            Submit Review
        </button>
    </div>
</form>

<!-- Display Reviews -->
<div class="reviews" style="margin-top: 2em;">
    <h3 style="font-size: 1.5rem; color: #333; margin-bottom: 1em;">What our customers say:</h3>
    @forelse($reviews as $review)
        <div class="review" 
            style="padding: 1em; border-bottom: 1px solid #ddd; margin-bottom: 1em;">
            <p style="font-weight: bold; margin-bottom: 0.5em;">
                Customer: {{ $review->user->name }}
            </p>
            <p style="color: #ffc107; font-size: 1.2rem; margin-bottom: 0.5em;">
                Rating: {{ str_repeat('★', $review->rating) }}
            </p>
            <p>{{ $review->review }}</p>
        </div>
    @empty
        <p>No reviews yet. Be the first to leave one!</p>
    @endforelse
</div>
</div>

<!-- JavaScript -->
<script>
function toggleFAQ(button) {
    const answer = button.nextElementSibling;
    const isVisible = answer.style.display === 'block';
    answer.style.display = isVisible ? 'none' : 'block';
    button.style.backgroundColor = isVisible ? '#f8f9fa' : '#e9ecef';
}

// Auto-scroll to reviews on form submission
document.querySelector('form').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent actual form submission for demo
    alert('Review submitted!'); // Simulate success message
    document.querySelector('.reviews').scrollIntoView({ behavior: 'smooth' });
});
</script>


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
