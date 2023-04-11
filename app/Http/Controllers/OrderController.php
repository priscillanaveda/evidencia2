<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::all();
        return view('orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $product = Product::find($request->input('product_id'));

        $order = new Order;
        $order->product_id = $product->id;
        $order->quantity = $request->input('quantity');
        $order->unit_price = $product->price;
        $order->total_price = $product->price * $request->input('quantity');
        $order->status = $request->input('status');
        $order->save();

        return redirect()->route('orders.index');
    }

    public function edit($id)
    {
        $order = Order::find($id);
        $products = Product::all();
        return view('orders.edit', compact('order', 'products'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($request->input('product_id'));

        $order = Order::find($id);
        $order->product_id = $product->id;
        $order->quantity = $request->input('quantity');
        $order->unit_price = $product->price;
        $order->total_price = $product->price * $request->input('quantity');
        $order->status = $request->input('status');
        $order->save();

        return redirect()->route('orders.index');
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect()->route('orders.index');
    }
}
