
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/form.css') }}">

</head>
<body>
    
    <div class="container">
        <h1>Supplier Profile Management</h1>
        
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('supplier.profile.update') }}" method="POST">
        @csrf
        
        <!-- Name -->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $supplier->name }}" required>
        </div>
        
        <!-- Email -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ $supplier->email }}" required>
        </div>
        
        <!-- Password -->
        <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Leave blank to keep the current password">
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm new password">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">Update Profile</button>
    </form>
</div>
    </body>
    </html>