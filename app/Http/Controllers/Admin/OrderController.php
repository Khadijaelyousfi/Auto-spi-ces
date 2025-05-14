<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use PDF;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('items.product')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('items.product')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function generatePdf($id)
    {
        $order = Order::with('items.product')->findOrFail($id);

        $pdf = PDF::loadView('admin.orders.pdf', compact('order'));

        return $pdf->download('commande_'.$order->id.'.pdf');
    }
}

