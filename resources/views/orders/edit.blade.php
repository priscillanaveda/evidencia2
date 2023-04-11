@extends('layouts.app')

@section('content')
    <h1>Editar Pedido</h1>
    <hr>
    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="product_id">ID del Producto</label>
            <select name="product_id" id="product_id" class="form-control">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ $order->product_id == $product->id ? 'selected' : '' }}>{{ $product->