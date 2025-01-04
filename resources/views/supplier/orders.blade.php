<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Orders</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f4f4f9;">
    <h1 style="text-align: center; font-size: 2rem; color: #333;">Orders</h1>
    
    <div style="max-width: 900px; margin: auto; background: #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 20px;">
        @foreach($orders as $order)
            <div style="border-bottom: 1px solid #ddd; padding-bottom: 15px; margin-bottom: 15px;">
                <h2 style="font-size: 1.5rem; color: #007bff;">Order ID: {{ $order->id }}</h2>
                <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
                
                <ul style="list-style: none; padding: 0; margin: 10px 0;">
                    @foreach($order->orderItems as $item)
                        <li style="padding: 10px 0; border-bottom: 1px solid #eee;">
                            <span style="font-weight: bold;">{{ $item->product->name }}</span>
                            <span style="display: block; color: #666;">Quantity: {{ $item->quantity }}</span>
                        </li>
                    @endforeach
                </ul>

                <p style="font-size: 1.1rem; color: #333; font-weight: bold;">Total: LKR {{ number_format($order->total_amount, 2) }}</p>
            </div>
        @endforeach
    </div>
</body>
</html>
