@extends('layouts.app')

@section('content')
    <h1>Crear Pedido</h1>
    <hr>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_id">ID del Producto</label>
            <select name="product_id" id="product_id" class="form-control">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Cantidad</label>
            <input type="number" name="quantity" id="quantity" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection