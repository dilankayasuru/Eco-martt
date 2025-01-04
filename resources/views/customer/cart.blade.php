<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="{{ asset('/cart.css') }}">
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
    <br><br><br><br><br>

    
    <div class="container" style="max-width: 900px; margin: 40px auto; font-family: Arial, sans-serif; color: #333;">
        <!-- Dynamic Quote -->
        <p id="discount-quote" style="text-align: center; font-size: 1.2rem; font-weight: bold; margin-bottom: 20px; color: #28a745;"></p>
    
        <h1 style="text-align: center; margin-bottom: 30px; font-size: 2.2rem;">Shopping Cart</h1>
    
        @if(session('success'))
            <div style="color: #155724; background-color: #d4edda; padding: 10px; border: 1px solid #c3e6cb; border-radius: 5px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div style="color: #721c24; background-color: #f8d7da; padding: 10px; border: 1px solid #f5c6cb; border-radius: 5px; margin-bottom: 20px;">
                {{ session('error') }}
            </div>
        @endif
    
        @if(empty($cart))
            <p style="text-align: center; font-size: 1.2rem; color: #555;">Your cart is empty!</p>
        @else
            <div class="cart-items">
                @foreach($cart as $item)
                    <div class="cart-item" style="display: flex; align-items: center; padding: 15px; border: 1px solid #e0e0e0; margin-bottom: 15px; border-radius: 8px; background-color: #fff; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                        <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" style="width: 120px; height: auto; border-radius: 5px; margin-right: 20px;">
                        
                        <div class="cart-item-details" style="flex: 1;">
                            <h3 style="font-size: 1.5rem; margin-bottom: 10px;">{{ $item['name'] }}</h3>
                            <p style="font-size: 1rem; color: #555;"><strong>Price:</strong> LKR {{ number_format($item['price'], 2) }}</p>
                            
                            <form action="{{ route('cart.update', $item['id']) }}" method="POST" style="margin-bottom: 10px;">
                                @csrf
                                <label for="quantity" style="font-size: 1rem; font-weight: bold;">Quantity:</label>
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" style="width: 60px; padding: 5px; border: 1px solid #ccc; border-radius: 5px; margin-right: 10px;">
                                <button type="submit" style="background-color: #007bff; color: white; border: none; padding: 8px 12px; border-radius: 5px; font-size: 0.9rem; cursor: pointer;">Update</button>
                            </form>
    
                            <form action="{{ route('cart.remove', $item['id']) }}" method="POST" style="display: inline-block;">
                                @csrf
                                <button type="submit" style="background-color: #dc3545; color: white; border: none; padding: 8px 12px; border-radius: 5px; font-size: 0.9rem; cursor: pointer;">Remove</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
    
            <div class="cart-summary" style="text-align: center; margin-top: 30px;">
                <h2 style="font-size: 1.8rem; font-weight: bold;">Total Amount: LKR {{ number_format($totalAmount, 2) }}</h2>
            
                @if($discount > 0)
                    <h3 style="color: green; font-size: 1.4rem;">Discount (10%): -LKR {{ number_format($discount, 2) }}</h3>
                @endif
            
                <h2 style="font-size: 1.8rem; font-weight: bold;">Total Amount Payable: LKR {{ number_format($payableAmount, 2) }}</h2>
            </div>
    
            <!-- Cart Action Buttons -->
            <div class="cart-action" style="text-align: center; margin-top: 30px;">
                <a href="{{ route('checkout.show') }}" style="display: inline-block; text-align: center; padding: 10px 25px; background-color: #28a745; color: white; font-size: 1rem; border-radius: 5px; text-decoration: none; margin-right: 10px; transition: 0.3s;">Proceed to Checkout</a>
                
                <a href="{{ route('products.index') }}" style="display: inline-block; text-align: center; padding: 10px 25px; background-color: #007bff; color: white; font-size: 1rem; border-radius: 5px; text-decoration: none; transition: 0.3s;">Back to Products</a>
            </div>
        @endif
    </div>
    
    <!-- JavaScript for Quote -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const totalAmount = {{ $totalAmount }};
            const discountQuote = document.getElementById("discount-quote");
    
            if (totalAmount >= 300) {
                discountQuote.textContent = "Great News! If you spend over LKR 3000, you’ll receive a 10% discount!";
            } else {
                discountQuote.textContent = "Add more products worth LKR " + (3000 - totalAmount).toFixed(2) + " to get a 10% discount!";
            }
        });
    </script>
    <br><br><br><br>
    
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
