<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;


class SupplierController extends Controller
{
    public function updateOrderStatus(Request $request, $orderId)
{
    $validated = $request->validate([
        'status' => 'required|in:pending,confirmed,shipped,delivered,cancelled',
    ]);

    $order = Order::findOrFail($orderId);

    // Ensure only the supplier responsible for the order can update it
    $supplierId = auth()->user()->id;
    $isSupplierRelated = $order->orderItems->contains(function ($item) use ($supplierId) {
        return $item->product->supplier_id === $supplierId;
    });

    if (!$isSupplierRelated) {
        return redirect()->back()->with('error', 'You are not authorized to update this order.');
    }

    $order->status = $validated['status'];
    $order->save();

    return redirect()->route('supplier.orders.index')->with('success', 'Order status updated successfully.');
}

}
