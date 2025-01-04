<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Registration</title>
    <link rel="stylesheet" href="/supplier-registration.css">
</head>
<body>

    <!-- Quote Section -->
    <div class="quote-section">
        <p><span>Partner with Us</span> <br><br> "Grow your business with our platform and sustainable opportunities."</p>
    </div>

    <div class="container">
        <h1>Supplier Registration</h1>

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

        <form method="POST" action="{{ route('register.supplier') }}" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" required>
            <input type="text" name="company_name" placeholder="Company Name" value="{{ old('company_name') }}" required>
            <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <input type="text" name="certification_name" placeholder="Certification Name" value="{{ old('certification_name') }}" required>
            <label for="certification_image">Upload Certification Image:</label>
            <input type="file" name="certification_image" required>
            <label for="valid_time_period">Certification Valid Time Period:</label>
            <input type="date" name="valid_time_period" required>
            <button type="submit">Register as Supplier</button>
        </form>

        <div class="form-footer">
            Already have an account? <a href="{{ route('login') }}">Login here</a>
        </div>
    </div>

    <!-- Additional Section -->
    <div class="quote-section">
        <p>"Empower your <span>eco-friendly business</span> with us."</p>
    </div>

    <!-- JavaScript for Dynamic Quotes -->
    <script>
        const quotes = [
            "Partner with us and grow your business sustainably.",
            "Empower your eco-friendly business with us.",
            "Join hands for a sustainable future.",
            "Reach your customers with impactful products.",
            "Together, let's build a greener tomorrow."
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
