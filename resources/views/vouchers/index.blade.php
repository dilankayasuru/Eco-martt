<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vouchers List</title>
    <link rel="stylesheet" href="{{ asset('voucher.css') }}">
</head>
<body>
    <div class="container">
        <h1>Voucher Management</h1>
       

        @if(session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Discount (%)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vouchers as $voucher)
                    <tr>
                        <td>{{ $voucher->code }}</td>
                        <td>{{ $voucher->discount }}%</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>