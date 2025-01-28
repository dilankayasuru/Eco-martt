<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Eco - Mart</title>
    <link rel="stylesheet" href="login.css">
</head>
<body style="background-image: url('{{ asset('images/profile1.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">

     <!-- Navbar -->
     <header>
        <nav class="navbar">
            <div class="logo">Eco - Mart</div>
            <ul class="nav-links">
                <li><a href="{{ route('home')}}">Home</a></li>
                <li><a href="{{ route('our-story')}}">Our Story</a></li>
                <li><a href="{{ route('login') }}">Our Products</a></li>
                <li><a href="{{ route('contact-us')}}">Contact Us</a></li>
            </ul>
            <div class="navbar-buttons">
                <a href="{{ route('login') }}" class="cart-btn">🛒</a>
                <a href="{{ route('login') }}">Login</a>  
            </div>
        </nav>
    </header>

    <!-- Quote Section -->
    <div class="quote-section">
        <p><span>Welcome Back!</span></p>
    </div>

    <!-- Login Form -->
    <div class="container">
        <h1>Login </h1>

        
        
        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
            <!-- Error Messages -->
        @if ($errors->any())
        <div id="error-message" style="
            background-color: #f8d7da; 
            color: #721c24; 
            border: 1px solid #f5c6cb; 
            padding: 15px; 
            border-radius: 5px; 
            margin-bottom: 80px; 
            font-size: 18px; 
            text-align: left;
            max-width: 600px;
            margin: 0 auto;
        ">
            <ul style="list-style: none; padding-left: 0; margin: 0;">
                @foreach ($errors->all() as $error)
                <li style="margin-bottom: 5px;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    
        <script>
            // Automatically remove the error message after 5 seconds
            setTimeout(() => {
                const errorMessage = document.getElementById('error-message');
                if (errorMessage) {
                    errorMessage.style.transition = 'opacity 0.5s ease'; // Smooth fade out
                    errorMessage.style.opacity = '0'; // Fade out effect
                    setTimeout(() => errorMessage.remove(), 500); // Remove element after fade
                }
            }, 5000); // 5 seconds
        </script>
        @endif
            @csrf
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit">Login</button>
        </form>

        <div class="form-footer">
            <p>Don't have an account? <a href="{{ route('register.customer') }}">Register as Customer</a></p>
            <p>Don't have an account? <a href="{{ route('register.supplier') }}">Register as Supplier</a></p>
        </div>
    </div>

    <!-- JavaScript for Dynamic Quotes -->
    <script>
        const quotes = [
            "Welcome back! Your sustainable journey continues.",
            "Login to your account and make eco-friendly choices.",
            "Secure your account with us today.",
            "Together, let's build a greener future.",
            "Every login brings you closer to eco-friendly living.",
            "Making sustainable choices is just a click away."
        ];

        const quoteSpan = document.querySelector(".quote-section p span");
        let currentIndex = 0;

        setInterval(() => {
            currentIndex = (currentIndex + 1) % quotes.length;
            quoteSpan.textContent = quotes[currentIndex];
        }, 3000); // Change quote every 3 seconds
    </script>

<div style="margin: 40px auto; padding: 25px; max-width: 1300px; background-color: #ffffff; border-radius: 12px; border: 1px solid #ddd; box-shadow: 0 6px 12px rgba(0,0,0,0.1);">
    <h1 style="color: #333; font-size: 28px; margin-bottom: 15px; text-align: center;">Supplier Sign-Up Guidelines</h1>
    <p style="color: #666; font-size: 18px; line-height: 1.8; text-align: justify;">Thank you for your interest in becoming a supplier. Please follow these steps to complete your sign-up process:</p>
    <ol style="margin-left: 40px; color: #555; font-size: 18px; line-height: 1.8;">
        <li style="margin-bottom: 12px;">Complete the registration form with your business details.</li>
        <li style="margin-bottom: 12px;">Upload the necessary certifications as part of your application.</li>
        <li style="margin-bottom: 12px;">Submit the form for our review.</li>
    </ol>
    <p style="color: #666; font-size: 18px; line-height: 1.8; text-align: justify;">After signing up, please allow <span style="color: #4CAF50; font-weight: bold;">1 business day for approval</span>. We will verify your details and certifications during this time. Once approved, you will gain full access to our platform.</p>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const section = document.querySelector('div');
        section.addEventListener('mouseenter', () => {
            section.style.border = '1px solid #4CAF50';
            section.style.transition = 'border 0.3s ease, box-shadow 0.3s ease';
            section.style.boxShadow = '0 8px 16px rgba(0,0,0,0.2)';
        });
        section.addEventListener('mouseleave', () => {
            section.style.border = '1px solid #ddd';
            section.style.boxShadow = '0 6px 12px rgba(0,0,0,0.1)';
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const guidelines = document.querySelector('div');
        guidelines.addEventListener('mouseenter', () => {
            guidelines.style.border = '1px solid #4CAF50';
            guidelines.style.transition = 'border 0.3s ease';
        });
        guidelines.addEventListener('mouseleave', () => {
            guidelines.style.border = '1px solid #ccc';
            guidelines.style.transition = 'border 0.3s ease';
        });
    });
</script>


</body>
</html>
