<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Dashboard</title>
    <link rel="stylesheet" href="{{ asset('/dashboard.css') }}">
</head>
<body>
    <!-- Navbar -->
    <header class="navbar">
        <div class="logo">Eco-Mart</div>
        <div class="navbar-buttons">
            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="button" class="btn-logout" onclick="confirmLogout()">Logout</button>
            </form>
        </div>
    </header>

    <!-- Main Content -->
    <div class="dashboard-container">
        <h1 id="welcome-heading">Welcome to the Eco-Mart</h1>
        <p style="font-size: 30px" class="welcome-message">Hello, {{ Auth::user()->name }}</p>

        <!-- Profile Management Card -->
        <div class="card">
            <div class="card-body">
                <h2>Profile Management</h2>
                <p>Update your profile details and preferences.</p>
                <a href="{{ route('supplier.profile') }}" class="btn btn-primary">Manage Profile</a>
            </div>
        </div>

        <!-- Add Product Button -->
        <div class="action-section">
            <!--add produt quote-->
            <a href="{{ route('supplier.products.create') }}" class="btn btn-add">Add Product</a>
        </div>

        <!-- Products Section -->
        <h2>Your Products</h2>
        @if(session('success'))
        <div class="alert alert-success" id="success-message">
            {{ session('success') }}
        </div>
        @endif
        
        <!-- Add this script to hide the success message after 3 seconds -->
        <script>
            // Wait for the page to load
            document.addEventListener('DOMContentLoaded', () => {
                const successMessage = document.getElementById('success-message');
                if (successMessage) {
                    setTimeout(() => {
                        successMessage.style.display = 'none'; // Hide the message
                    }, 3000); // 3000ms = 3 seconds
                }
            });
        </script>
        

        @if($products->isEmpty())
        <p class="no-products">No products found. Start by adding one!</p>
        @else
        <table class="table" id="product-table">
            <thead>
                <tr>
                    <th onclick="sortTable(0)">Category</th>
                    <th onclick="sortTable(1)">Name</th>
                    <th onclick="sortTable(2)">Price</th>
                    <th onclick="sortTable(3)">Quantity</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->category }}</td>
                    <td>{{ $product->name }}</td>
                    <td>Rs.{{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
                        @else
                        No Image
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('supplier.products.edit', $product->id) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('supplier.products.delete', $product->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

    <!-- JavaScript -->
    <script>
        // Logout confirmation
        function confirmLogout() {
            if (confirm('Are you sure you want to log out?')) {
                document.getElementById('logout-form').submit();
            }
        }

        // Dynamic welcome message
        const welcomeHeading = document.getElementById('welcome-heading');
        const hours = new Date().getHours();
        let greeting = 'Welcome to the Eco-Mart';

        if (hours >= 5 && hours < 12) {
            greeting = 'Good Morning, Welcome to the Eco-Mart';
        } else if (hours >= 12 && hours < 17) {
            greeting = 'Good Afternoon, Welcome to the Eco-Mart';
        } else if (hours >= 17 && hours < 22) {
            greeting = 'Good Evening, Welcome to the Eco-Mart';
        }

        welcomeHeading.textContent = greeting;

        // Table sorting function
        function sortTable(columnIndex) {
            const table = document.getElementById('product-table');
            const rows = Array.from(table.rows).slice(1); // Skip the header row
            const isNumeric = columnIndex === 2 || columnIndex === 3; // Price or Quantity
            const direction = table.getAttribute('data-sort-dir') === 'asc' ? 'desc' : 'asc';
            table.setAttribute('data-sort-dir', direction);

            rows.sort((a, b) => {
                const aText = a.cells[columnIndex].textContent.trim();
                const bText = b.cells[columnIndex].textContent.trim();

                if (isNumeric) {
                    return direction === 'asc' ? aText - bText : bText - aText;
                } else {
                    return direction === 'asc' ? aText.localeCompare(bText) : bText.localeCompare(aText);
                }
            });

            rows.forEach(row => table.tBodies[0].appendChild(row));
        }
    </script>


<!--button for view orders-->
<div class="action-section">
    <a href="{{ route('supplier.orders.index') }}" class="btn btn-view">View Orders</a>
   


   

 
  
</body>
</html>
