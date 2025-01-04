<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Registration</title>
    <link rel="stylesheet" href="{{ asset('/registration.css') }}">
    <style>
        /* General Styling */
        body {
            margin: 0;
            padding: 0;
            color: #333;
            background-image: url('{{ asset('images/bg3.jpg') }}');
            background-size: cover;
            
            
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background: #ffffff;
            width: 600px;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.6);
        }

        h1 {
            font-size: 34px;
            text-align: center;
            margin-bottom: 20px;
            color: #28982f;
        }

        /* Quote Section */
        .quote-section {
            text-align: center;
            margin-bottom: 30px;
            color: #444;
            font-size: 20px;
        }

        .quote-section span {
            font-size: 20px;
            font-weight: bold;
            color: #2cc636;
        }

        /* Alert Messages */
        .alert {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
            font-size: 17px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        form input {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #19c436;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }

        form input:focus {
            border-color: #33cb11;
            outline: none;
            box-shadow: 0 0 5px rgba(20, 210, 80, 0.5);
        }

        form button {
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            color: #ffffff;
            background-color: #24b017;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        form button:hover {
            background-color: #000000;
            transform: translateY(-3px);
        }

        .form-footer {
            text-align: center;
            margin-top: 15px;
            font-size: 18px;
        }

        .form-footer a {
            color: #17cb11;
            text-decoration: none;
            font-weight: bold;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

     

    
    <!-- Quote Section -->
    <div class="quote-section">
        <p><span>Join us today</span> <br><br> "unlock exclusive offers and sustainable solutions for your everyday needs."</p>
    </div>

    <div class="container">
        <h1>Customer Registration</h1>

        <!-- Display Success Message -->
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <!-- Display Error Messages -->
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('register.customer') }}">
            @csrf
            <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required>
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <button type="submit">Register as Customer</button>
        </form>

        <div class="form-footer">
            Already have an account? <a href="{{ route('login') }}">Login here</a>
        </div>
    </div>

    <!-- Additional Section -->
    <div class="quote-section">
        <p>"We believe in making <span>eco-friendly choices</span> accessible for everyone."</p>
    </div>

    <!-- JavaScript for Dynamic Quotes -->
    <script>
        const quotes = [
            "Join us today and unlock exclusive offers and sustainable solutions for your everyday needs.",
            "We believe in making eco-friendly choices accessible for everyone.",
            "A greener world starts with simple choices—start yours with us.",
            "Support sustainable practices by becoming a part of our family.",
            "Experience the joy of making impactful eco-friendly decisions."
        ];

        const quoteSection = document.querySelector('.quote-section p span');
        let index = 0;

        setInterval(() => {
            index = (index + 1) % quotes.length;
            quoteSection.textContent = quotes[index];
        }, 5000); // Change quote every 5 seconds
    </script>
</body>
</html>
