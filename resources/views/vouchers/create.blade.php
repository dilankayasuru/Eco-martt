{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Voucher</title>
    <link rel="stylesheet" href="{{ asset('voucher.css') }}">
</head>
<body>
    <div class="container">
        <h1>Create a New Voucher</h1>
        <form action="{{ route('vouchers.store') }}" method="POST">
            @csrf
            <label for="code">Voucher Code</label>
            <input type="text" id="code" name="code" required>

            <label for="discount">Discount (%)</label>
            <input type="number" id="discount" name="discount" required min="1" max="100">

            <button type="submit" class="btn">Create Voucher</button>
        </form>
    </div>
</body>
</html> --}}