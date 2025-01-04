<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class SupplierDashboardController extends Controller
{
    public function index()
    {
        $products = Auth::user()->products; // Fetch products added by the supplier
        return view('supplier.dashboard', compact('products'));
    }
    
   // Show the profile page
   public function showProfile()
   {
       $supplier = Auth::user(); // Get the authenticated supplier
       return view('supplier.profile', compact('supplier'));
   }

   // Handle profile update
   public function updateProfile(Request $request)
   {
       $supplier = Auth::user(); // Get the authenticated supplier

       // Validate inputs
       $request->validate([
           'name' => 'required|string|max:255',
           'email' => 'required|email|unique:users,email,' . $supplier->id, // Ensure unique email
           'password' => 'nullable|string|min:8|confirmed', // Optional password update
           
       ]);

       // Update basic details
       $supplier->update([
           'name' => $request->name,
           'email' => $request->email,
       ]);

       // Update password only if provided
       if ($request->filled('password')) {
           $supplier->update([
               'password' => Hash::make($request->password),
           ]);
       }

       return redirect()->route('supplier.profile')->with('success', 'Profile updated successfully.');
   }

}