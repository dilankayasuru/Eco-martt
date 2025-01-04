<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <link rel="stylesheet" href="{{ asset('/product-details.css') }}">
</head>
<style>
    body {
           margin: 0;
           padding: 0;
           color: #333;
           background-image: url('{{ asset('images/bg3.jpg') }}');
           background-size: cover;   
           flex-direction: column;
           align-items: center;
           justify-content: center;
           height: 100vh;
       }
</style>
<body>
    <div class="product-details-container" 
    style="max-width: 1200px; margin: 2em auto; padding: 2em; background-color: #65eb1121; border-radius: 10px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5); display: flex; flex-wrap: wrap; gap: 2em; font-family: Arial, sans-serif; color: #333;">
    
    <!-- Product Image -->
    <div class="product-image" style="flex: 1 1 40%; max-width: 400px; text-align: center;">
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" 
             style="max-width: 100%; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    </div>

    <!-- Product Info -->
    <div class="product-info" style="flex: 1 1 55%; padding: 0 1em;">
        <h1 style="font-size: 2rem; color: #28a745; margin-bottom: 1em;">{{ $product->name }}</h1>
        <p style="margin-bottom: 0.5em;"><strong>Description: </strong>{{ $product->description }}</p>
        <p style="margin-bottom: 0.5em;"><strong>Category: </strong>{{ $product->category }}</p>
        <p style="margin-bottom: 0.5em; "><strong>Price: </strong>Rs.{{ number_format($product->price, 2) }}</p>
        <p style="margin-bottom: 0.5em;"><strong>Available Quantity: </strong>{{ $product->quantity }}</p>
        <p style="margin-bottom: 0.5em;"><strong>Supplier: </strong>{{ $product->supplier->name }}</p>
        <p style="margin-bottom: 1em;"><strong>Product Certification Name: </strong>{{ $product->product_certification }}</p>

        <!-- Product Certification -->
        <div class="product-certification" style="margin-bottom: 1em;">
            @if($product->product_certification_image)
                <h4 style="font-size: 1.2rem; color: #007bff; margin-bottom: 0.5em;">Product Certification Image:</h4>
                <img src="{{ asset('storage/' . $product->product_certification_image) }}" alt="Certification Image" 
                     style="max-width: 150px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            @else
                <p>No certification image available.</p>
            @endif
        </div>

        <!-- Add to Cart Form -->
        <form action="{{ route('cart.add') }}" method="POST" class="cart-form" style="margin-top: 1.5em;">
            @csrf
            <label for="quantity" style="font-weight: bold; margin-right: 0.5em;">Quantity:</label>
            <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $product->quantity }}" 
                   required style="padding: 0.5em; font-size: 1rem; border: 1px solid #ddd; border-radius: 5px; margin-right: 1em; max-width: 100px;">
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit" 
                    class="btn btn-add-cart" 
                    style="background-color: #1e7e34; color: white; padding: 10px 20px; font-size: 1rem; font-weight: bold; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s, transform 0.2s; margin-top: 10px;"
                    onmouseover="this.style.backgroundColor='#218838'; this.style.transform='translateY(-3px)';" 
                    onmouseout="this.style.backgroundColor='#1e7e34'; this.style.transform='translateY(0)';">
                Add to Cart
            </button>
        </form>

        <!-- Back to Products Link -->
        <a href="{{ route('products.index') }}" 
           style="display: inline-block; text-decoration: none; background-color: #030703; color: white; padding: 10px 20px; font-size: 1rem; font-weight: bold; border-radius: 5px; transition: background-color 0.3s, transform 0.2s; margin-top: 1.5em;" 
           onmouseover="this.style.backgroundColor='#0056b3'; this.style.transform='translateY(-3px)';" 
           onmouseout="this.style.backgroundColor='#007bff'; this.style.transform='translateY(0)';">
            Back to Products
        </a>
    </div>
</div>

<script>
    // Validate quantity input to ensure it's within available stock
    document.getElementById('quantity').addEventListener('input', function () {
        const maxQuantity = {{ $product->quantity }};
        const inputQuantity = parseInt(this.value);
        
        if (inputQuantity > maxQuantity) {
            alert(`Maximum available quantity is ${maxQuantity}`);
            this.value = maxQuantity;
        } else if (inputQuantity < 1) {
            alert('Quantity cannot be less than 1');
            this.value = 1;
        }
    });

    // Add a subtle animation when hovering over the cart button
    document.querySelector('.btn-add-cart').addEventListener('mouseover', function () {
        this.style.transform = 'scale(1.05)';
    });

    document.querySelector('.btn-add-cart').addEventListener('mouseout', function () {
        this.style.transform = 'scale(1)';
    });
</script>

</body>
</html>
