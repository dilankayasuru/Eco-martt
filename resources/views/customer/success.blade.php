<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
</head>
<body>
    <div style="text-align: center; margin-top: 50px;">
        <h1>Thank You for Your Payment!</h1>
        <p>Your order has been successfully placed.</p>
        <a href="{{ route('orders.index') }}" style="padding: 10px 20px; background-color: #28a745; color: white; text-decoration: none; border-radius: 5px;">View My Orders</a>
    </div>
</body>
</html>