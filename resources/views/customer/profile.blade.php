<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Profile</title>
    <link rel="stylesheet" href="{{ asset('/profile.css') }}">
</head>
<body >

    
    <section class="banner" style="background-image: url('{{ asset('images/5522-1024x683.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; background-position: right;" >
    

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

    <div class="container">
     <!-- Display Flash Messages -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            {{ session('success') }}
            <button type="button" class="close-btn" onclick="this.parentElement.style.display='none';">&times;</button>
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close-btn" onclick="this.parentElement.style.display='none';">&times;</button>
        </div>
        @endif

        <script>
            // Auto-hide alerts after 5 seconds
            setTimeout(() => {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(alert => alert.style.display = 'none');
            }, 5000); // 5000ms = 5 seconds
        </script>


        <!-- Profile Header -->
        <div class="profile-header">
            <h1>Welcome, {{ $customer->name }}</h1>
            <p>Manage your profile details and account settings</p>
        </div>

        <!-- View Profile Details -->
        <div class="profile-section">
            <h2>Profile Details</h2>
            <div class="profile-details">
                <p><strong>Name: </strong> {{  $customer->name }}</p>
                <p><strong>Email: </strong> {{  $customer->email }}</p>
            </div>
        </div>

        <!-- Edit Profile Details -->
        <div class="edit-section">
            <h2>Edit Profile</h2>
            <form action="{{ route('customer.profile.update', $customer->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="{{ $customer->name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="{{ $customer->email }}" required>
                </div>
                <button type="submit" class="btn-save">Save Changes</button>
            </form>
        </div>

        <!-- Change Password Section -->
        <div class="password-section">
            <h2>Change your Password</h2>
            <form action="{{ route('customer.profile.password.update') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="current_password">Current Password:</label>
                    <input type="password" id="current_password" name="current_password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="new_password">New Password:</label>
                    <input type="password" id="new_password" name="new_password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="new_password_confirmation">Confirm New Password:</label>
                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" required>
                </div>
                <button type="submit" class="btn-save">Update Password</button>
            </form>
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
