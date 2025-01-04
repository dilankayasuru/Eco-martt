<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;


class CustomerController extends Controller
{
    public function show()
    {
        $customer = auth()->user(); // Get the authenticated customer
        return view('customer.profile', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = User::findOrFail($id);
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);
    
        $customer->update($request->all());
    
        // Flash success message
        session()->flash('success', 'Profile updated successfully.');
    
        return redirect()->route('customer.profile');
    }
    

    public function updatePassword(Request $request)
    {
        $customer = auth()->user();
    
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);
    
        if (!Hash::check($request->current_password, $customer->password)) {
            // Flash error message
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }
    
        $customer->update(['password' => Hash::make($request->new_password)]);
    
        // Flash success message
        session()->flash('success', 'Password updated successfully.');
    
        return redirect()->route('customer.profile');
    }
    
}
