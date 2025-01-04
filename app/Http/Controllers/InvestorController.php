<?php

namespace App\Http\Controllers;

use App\Models\Investor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InvestorController extends Controller
{
    public function index()
    {
        $investors = Investor::all();
        return view('investors.index', compact('investors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:investors',
            'purpose' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $logoPath = null;

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        Investor::create([
            'name' => $request->name,
            'email' => $request->email,
            'purpose' => $request->purpose,
            'logo' => $logoPath,
        ]);

        return redirect()->back()->with('success', 'Investor has joined successfully!');
    }
}
