<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function analytics()
    {
        // Total number of registered users
        $totalUsers = User::count();
    
        // Weekly new signups (last 7 days)
        $weeklySignups = User::where('created_at', '>=', now()->subDays(7))->count();
    
        // Total pending accounts (assuming you have an 'is_approved' or similar column to track approval status)
        $pendingAccounts = User::whereHas('supplier', function ($query) {
            $query->where('is_approved', false);
        })->count();
    
        // Count the number of suppliers (role_id = 4)
        $suppliersCount = User::where('role_id', 4)->count();
    
        // Count the number of customers (role_id = 5)
        $customersCount = User::where('role_id', 5)->count();
    
        // Get lists of customers and suppliers
        $customers = User::where('role_id', 5)->get();
        $suppliers = User::where('role_id', 4)->with('supplier')->get();
    
        // Pass data to the Blade view
        return view('admin.analytics', [
            'totalUsers' => $totalUsers,
            'weeklySignups' => $weeklySignups,
            'pendingAccounts' => $pendingAccounts,
            'suppliersCount' => $suppliersCount,
            'customersCount' => $customersCount,
            'customers' => $customers,
            'suppliers' => $suppliers,
        ]);
    }

    public function approveSupplier($id)
    {
        // Find the user
        $user = User::find($id);
    
        if (!$user || $user->role_id != 4) {
            return redirect()->route('admin.analytics')->with('error', 'Supplier not found or invalid.');
        }
    
        // Find the related supplier record
        $supplier = $user->supplier; // Assuming there is a one-to-one relationship defined in the User model
    
        if (!$supplier) {
            return redirect()->route('admin.analytics')->with('error', 'Supplier details not found.');
        }
    
        // Approve the supplier
        $supplier->is_approved = true; // Update the `is_approved` column in the `suppliers` table
        $supplier->save();
    
        return redirect()->route('admin.analytics')->with('success', 'Supplier approved successfully.');
    }


    // Delete a user
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('admin.analytics')->with('error', 'User not found.');
        }

        $user->delete();

        return redirect()->route('admin.analytics')->with('success', 'User deleted successfully.');
    }
}