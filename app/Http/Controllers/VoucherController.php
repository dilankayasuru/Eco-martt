<?php

// app/Http/Controllers/VoucherController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::all();
        return view('vouchers.index', compact('vouchers'));
    }

    public function create()
    {
        return view('vouchers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|unique:vouchers|max:10',
            'discount' => 'required|numeric|min:1|max:100',
        ]);

        Voucher::create($validated);
        return redirect()->route('vouchers.index')->with('success', 'Voucher created successfully!');
   }
}

?>