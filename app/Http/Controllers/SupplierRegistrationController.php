<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SupplierRegistrationController extends Controller
{
    public function showForm()
    {
        return view('auth.register_supplier');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'company_name' => 'required|string|max:255',
            'certification_name' => 'required|string|max:255',
            'certification_image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Max size: 2MB
            'valid_time_period' => 'required|date',
        ]);

        // Create the user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role_id' => Role::where('name', 'Supplier')->first()->id,
        ]);

        // Upload certification image
        $certificationImagePath = $request->file('certification_image')->store('certifications', 'public');

        // Save supplier-specific data
        $user->supplier()->create([
            'company_name' => $validated['company_name'],
            'certification_name' => $validated['certification_name'],
            'certification_image' => $certificationImagePath,
            'valid_time_period' => $validated['valid_time_period'],
        ]);

        return redirect()->route('supplier.pending')->with('success', 'Your registration is pending approval.');
    }

    

    
}
