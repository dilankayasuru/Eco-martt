<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f9fa; margin: 0; padding: 20px;">
    @if(session('success'))
        <div class="alert alert-success" style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 20px; border: 1px solid #c3e6cb; border-radius: 4px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="container" style="max-width: 600px; margin: auto; background: #ffffff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); padding: 20px;">
        <h1 style="text-align: center; color: #333; margin-bottom: 20px;">Add Product</h1>
        <form action="{{ route('supplier.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="name" style="display: block; margin-bottom: 5px; font-weight: bold;">Product Name</label>
                <input type="text" name="name" id="name" class="form-control" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
    
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="category" style="display: block; margin-bottom: 5px; font-weight: bold;">Category</label>
                <select name="category" id="category" class="form-control" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                    <option value="" disabled selected>Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}">{{ $category }}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="description" style="display: block; margin-bottom: 5px; font-weight: bold;">Description</label>
                <textarea name="description" id="description" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
            </div>
    
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="price" style="display: block; margin-bottom: 5px; font-weight: bold;">Price</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
    
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="quantity" style="display: block; margin-bottom: 5px; font-weight: bold;">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <!--product certification-->
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="product_certification" style="display: block; margin-bottom: 5px; font-weight: bold;">Product Certification:</label>
                <input type="text" id="product_certification" name="product_certification" class="form-control" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            
            <div class="form-group">
                <label for="product_certification_image">Product Certification Image:</label>
                <input type="file" id="product_certification_image" name="product_certification_image" class="form-control">
            </div>
            
            
            

            
    
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="image" style="display: block; margin-bottom: 5px; font-weight: bold;">Product Image</label>
                <input type="file" name="image" id="image" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
    
            <button type="submit" class="btn btn-success" style="display: block; width: 100%; background-color: #28a745; color: white; border: none; padding: 10px; border-radius: 4px; font-size: 16px; cursor: pointer; transition: background-color 0.3s;">
                Add Product
            </button>
        </form>
    </div>

    <!--back to dashboard-->
    <div style="text-align: center; margin-top: 20px;">
        <a href="{{ route('supplier.dashboard') }}" style="text-decoration: none; color: #333; font-size: 16px;">Back to Dashboard</a>
    </div>

    
</body>
</html>
