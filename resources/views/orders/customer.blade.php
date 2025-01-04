<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <style>
        /* Navbar styling */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1em 2em;
            background-color: #28a745;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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

        .navbar-buttons form button {
            padding: 10px 20px;
            background-color: #e74c3c;
            border: none;
            color: #fff;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Order Tracking Styling */
        .order-tracking-container {
            max-width: 800px;
            margin: 100px auto;
            font-family: Arial, sans-serif;
            color: #333;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .order-card {
            padding: 25px;
            margin-bottom: 30px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .order-header {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }

        .tracking-progress {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            margin-bottom: 20px;
            padding: 0 20px;
        }

        .tracking-progress::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 10%;
            right: 10%;
            height: 4px;
            background-color: #d9d9d9;
            z-index: 1;
            transform: translateY(-50%);
        }

        .tracking-step {
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index: 2;
        }

        .tracking-step span {
            display: block;
            width: 30px;
            height: 30px;
            background-color: #d9d9d9;
            border-radius: 50%;
            position: relative;
            margin-bottom: 10px;
        }

        .tracking-step span.active {
            background-color: #28a745;
        }

        .tracking-step p {
            font-size: 0.9rem;
            color: #555;
            margin: 0;
            text-align: center;
        }

        ul.product-list {
            list-style: none;
            padding: 0;
            margin: 15px 0;
        }

        ul.product-list li {
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e0e0e0;
        }

        ul.product-list li span {
            display: block;
            font-size: 1rem;
            color: #333;
        }

        .order-total {
            font-size: 1.3rem;
            font-weight: bold;
            margin-top: 15px;
            color: #28a745;
        }

        /* Footer Styling */
        .footer {
            background-color: #000;
            color: #fff;
            padding: 30px;
            text-align: center;
            margin-top: 50px;
        }
    </style>
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
                <a href="{{ route('cart.show')}}">🛒</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </nav>
    </header>

    <br><br><br>

    <!-- Order Tracking -->
    <div class="order-tracking-container">
        @if($orders->isEmpty())
            <p>No orders found.</p>
        @else
            @foreach($orders as $order)
                <div class="order-card">
                    <h2 class="order-header">Order ID: {{ $order->id }}</h2>
                    <div class="tracking-progress">
                        <div class="tracking-step">
                            <span class="{{ in_array($order->status, ['pending', 'confirmed', 'shipped', 'delivered']) ? 'active' : '' }}"></span>
                            <p>Pending</p>
                        </div>
                        <div class="tracking-step">
                            <span class="{{ in_array($order->status, ['confirmed', 'shipped', 'delivered']) ? 'active' : '' }}"></span>
                            <p>Confirmed</p>
                        </div>
                        <div class="tracking-step">
                            <span class="{{ in_array($order->status, ['shipped', 'delivered']) ? 'active' : '' }}"></span>
                            <p>Shipped</p>
                        </div>
                        <div class="tracking-step">
                            <span class="{{ $order->status === 'delivered' ? 'active' : '' }}"></span>
                            <p>Delivered</p>
                        </div>
                    </div>
                    <ul class="product-list">
                        @foreach($order->orderItems as $item)
                            <li>
                                <span><strong>Product:</strong> {{ $item->product->name }}</span>
                                <span><strong>Quantity:</strong> {{ $item->quantity }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <p class="order-total">Total: LKR {{ number_format($order->total_amount, 2) }}</p>
                </div>
            @endforeach
        @endif
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Eco - Mart. All Rights Reserved.</p>
    </footer>

</body>
</html>