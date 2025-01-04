<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Pending</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f2f7e9;
            color: #3b3b3b;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 100px;
            text-align: center;
        }
        h1 {
            font-size: 2.5rem;
            color: #4CAF50;
        }
        p {
            font-size: 1.2rem;
        }
        .card {
            border: none;
            background: #ffffff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
        }
        .footer {
            margin-top: 30px;
            font-size: 0.9rem;
            color: #555;
        }
        .btn-login {
            background-color: #4CAF50;
            color: white;
            font-size: 1rem;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .btn-login:hover {
            background-color: #45a049;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Registration Pending</h1>
            <p>Thank you for registering as a supplier!</p>
            <p>Your account is currently under review. This process typically takes 1-2 hours.</p>
            <p>We may contact you via phone to verify your details.</p>
            <p>Once approved, you will receive a confirmation call and will be able to access your supplier dashboard.</p>
            <a href="{{ route('login') }}" class="btn-login">Go to Login</a>
        </div>
        <div class="footer">
            <p>We appreciate your patience and look forward to partnering with you on this eco-friendly journey.</p>
        </div>
    </div>
</body>
</html>