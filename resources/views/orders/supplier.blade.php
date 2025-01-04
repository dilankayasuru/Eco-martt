<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders for Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px;">
    <h1 style="font-size: 2rem;">Orders for Confirmation</h1>

    @foreach ($orders as $order)
        <div style="margin-bottom: 30px; border: 1px solid #ddd; padding: 15px; border-radius: 8px;">
            <h2 style="font-size: 1.5rem;">Order ID: {{ $order->id }}</h2>
            <p>Status: <strong>{{ ucfirst($order->status) }}</strong></p>
            <ul>
                @foreach ($order->orderItems as $item)
                    <li>{{ $item->product->name }} - Quantity: {{ $item->quantity }}</li>
                @endforeach
            </ul>
            <p>Total: LKR {{ number_format($order->total_amount, 2) }}</p>

            <form action="{{ route('supplier.orders.update', $order->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <label for="status">Update Status:</label>
                <select name="status" id="status" style="margin-left: 10px; padding: 5px;">
                    <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ $order->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                    <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                    <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
                <button type="submit" style="margin-left: 15px; padding: 8px 15px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer;">
                    Update Order
                </button>
            </form>
        </div>
    @endforeach

    <!--back to suppiler dashboard-->
    <a href="{{ route('supplier.dashboard') }}" style="display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;">Back to Dashboard</a>
</body>
</html>
