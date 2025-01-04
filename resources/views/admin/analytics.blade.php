<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Analytics</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Admin - Analytics</h1>

        <!-- Success and Error Messages -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Display Counts -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Customers</h5>
                        <p class="card-text">{{ $customersCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Suppliers</h5>
                        <p class="card-text">{{ $suppliersCount }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Registered Users</h5>
                        <p class="card-text">{{ $totalUsers }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Weekly New Signups</h5>
                        <p class="card-text">{{ $weeklySignups }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Pending Accounts</h5>
                        <p class="card-text">{{ $pendingAccounts }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Display Suppliers -->
        <h2 class="mt-4">Suppliers</h2>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Approved</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->id }}</td>
                        <td>
                            <a href="#" class="supplier-link" 
                               data-id="{{ $supplier->id }}"
                               data-name="{{ $supplier->name }}"
                               data-email="{{ $supplier->email }}"
                               data-company="{{ $supplier->supplier->company_name ?? 'N/A' }}"
                               data-certification_name="{{ $supplier->supplier->certification_name ?? 'N/A' }}"
                               data-status="{{ $supplier->supplier && $supplier->supplier->is_approved ? 'Approved' : 'Pending' }}">
                               {{ $supplier->name }}
                            </a>
                        </td>
                        <td>{{ $supplier->email }}</td>
                        <td>
                            @if ($supplier->supplier && $supplier->supplier->is_approved)
                                <span class="badge bg-success">Approved</span>
                            @else
                                <span class="badge bg-warning">Approve</span>
                            @endif
                        </td>
                        <td>
                            <!-- Approve Button -->
                            @if (!$supplier->supplier || !$supplier->supplier->is_approved)
                                <form method="POST" action="{{ route('admin.supplier.approve', $supplier->id) }}" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                </form>
                            @endif

                            <!-- Delete Button -->
                            <form method="POST" action="{{ route('admin.user.destroy', $supplier->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Display Customers -->
        <h2 class="mt-4">Customers</h2>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.user.destroy', $customer->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="supplierModal" tabindex="-1" aria-labelledby="supplierModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="supplierModalLabel">Supplier Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>ID:</strong> <span id="supplierId"></span></p>
                    <p><strong>Name:</strong> <span id="supplierName"></span></p>
                    <p><strong>Email:</strong> <span id="supplierEmail"></span></p>
                    <p><strong>Company:</strong> <span id="supplierCompany"></span></p>
                <p><strong>Certification Name:</strong> <span id="supplierCertificationName"></span></p>
                    <p><strong>Status:</strong> <span id="supplierStatus"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn

-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Select all supplier links
            const supplierLinks = document.querySelectorAll('.supplier-link');

            // Add a click event listener to each link
            supplierLinks.forEach(link => {
                link.addEventListener('click', function (event) {
                    event.preventDefault(); // Prevent default link behavior

                    // Get supplier data from data-* attributes
                    const supplierId = this.getAttribute('data-id');
                    const supplierName = this.getAttribute('data-name');
                    const supplierEmail = this.getAttribute('data-email');
                    const supplierCompany = this.getAttribute('data-company');
                    const supplierCertificationName = this.getAttribute('data-certification_name');
                    const supplierStatus = this.getAttribute('data-status');

                    console.log(supplierId, supplierName, supplierEmail, supplierCompany, supplierCertificationName, supplierStatus);

                    // Populate modal fields
                    document.getElementById('supplierId').textContent = supplierId;
                    document.getElementById('supplierName').textContent = supplierName;
                    document.getElementById('supplierEmail').textContent = supplierEmail;
                    document.getElementById('supplierCompany').textContent = supplierCompany;
                    document.getElementById('supplierCertificationName').textContent = supplierCertificationName;
                    document.getElementById('supplierStatus').textContent = supplierStatus;

                    // Show the modal
                    const supplierModal = new bootstrap.Modal(document.getElementById('supplierModal'));
                    supplierModal.show();
                });
            });
        });
    </script>
</body>
</html>