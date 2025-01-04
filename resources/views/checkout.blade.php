<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f9f9f9;">

    <div style="max-width: 800px; margin: 50px auto; padding: 20px; background: #ffffff; border-radius: 8px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
        <h1 style="text-align: center; color: #333; font-size: 28px; margin-bottom: 20px;">Proceed to Checkout</h1>

       <!-- Order Summary -->
<div style="background: #fff; padding: 25px 30px; border: 1px solid #e1e4e8; border-radius: 8px; max-width: 600px; margin: 20px auto; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    <h2 style="font-size: 22px; font-weight: 600; color: #2c3e50; margin-bottom: 20px; border-bottom: 2px solid #f1f1f1; padding-bottom: 10px;">Order Summary</h2>

    @foreach ($cart as $item)
        <div style="display: flex; justify-content: space-between; align-items: center; background: #f9f9f9; padding: 15px 20px; margin-bottom: 15px; border-radius: 8px; border: 1px solid #e8e8e8; transition: all 0.2s ease-in-out;">
            <div style="max-width: calc(100% - 80px);">
                <p style="font-size: 18px; font-weight: 600; color: #2c3e50; margin-bottom: 5px;">{{ $item['name'] }}</p>
                <p style="font-size: 14px; color: #555; margin-bottom: 4px;">Quantity: {{ $item['quantity'] }}</p>
                <p style="font-size: 14px; color: #555; margin-bottom: 4px;">Price: LKR {{ number_format($item['price'], 2) }}</p>
            </div>

            <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px; border: 1px solid #ddd;">
        </div>
    @endforeach

    <div style="margin-top: 25px; padding-top: 15px; border-top: 2px solid #e1e4e8;">
        <p style="font-size: 18px; font-weight: 600; color: #2c3e50; margin: 8px 0;">Total Amount: LKR {{ number_format($totalAmount, 2) }}</p>

        @if($discount > 0)
            <p style="font-size: 16px; color: #27ae60; font-weight: 600;">Discount (10%): -LKR {{ number_format($discount, 2) }}</p>
        @endif

        <p style="font-size: 20px; color: #007bff; font-weight: 700;">Total Amount Payable: LKR {{ number_format($payableAmount, 2) }}</p>
    </div>
</div>
       <br>

        <!-- Checkout Form -->
        <h2 style="font-size: 22px; font-weight: 600; color: #2c3e50; margin-bottom: 20px;">Checkout Details</h2>
        <form action="{{ route('checkout.process') }}" method="POST" style="display: flex; flex-direction: column; gap: 15px;">
            @csrf

            <label style="font-size: 16px; font-weight: bold; color: #555;">Full Name:</label>
            <input type="text" name="full_name" required style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px;">

            <label style="font-size: 16px; font-weight: bold; color: #555;">Address:</label>
            <textarea name="address" required style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px;"></textarea>

            <label style="font-size: 16px; font-weight: bold; color: #555;">Contact Number:</label>
            <input type="text" name="contact_no" required style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px;">

            <label style="font-size: 16px; font-weight: bold; color: #555;">Email:</label>
            <input type="email" name="email" required style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px;">

            <label style="font-size: 16px; font-weight: bold; color: #555;">Payment Method: <span style="font-size: 18px; color:rgb(34, 132, 41)"> Card </span></label>
            <input type="hidden" name="payment_method" value="cash_on_delivery">


            <button type="submit" style="padding: 12px; font-size: 16px; font-weight: bold; color: white; background-color: #007bff; border: none; border-radius: 5px; cursor: pointer;">Place Order</button>
        </form>
    </div>

</body>
</html>
