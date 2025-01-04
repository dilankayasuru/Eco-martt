<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate login credentials
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Attempt to log in
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            // Redirect based on role
            if ($user->role->name === 'Admin') {
                return redirect()->route('admin.analytics');
            } elseif ($user->role->name === 'Supplier') {
                // Check if the supplier is approved
                if ($user->supplier && $user->supplier->is_approved) {
                    return redirect()->route('supplier.dashboard');
                } else {
                    // If not approved, log out and redirect to a pending acknowledgment page
                    Auth::logout();
                    return redirect()->route('supplier.pending')->with('warning', 'Your account is not yet approved. Please wait for approval.');
                }
            } elseif ($user->role->name === 'Customer') {
                return redirect()->route('customer.dashboard');
            }
        }
    
        // If login fails
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
