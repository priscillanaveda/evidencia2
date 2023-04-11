@extends('layouts.app')

@section('content')
    <h1>Listado de Pedidos</h1>
    <a href="{{ route('orders.create') }}" class="btn btn-primary">Crear Pedido</a>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>ID del Pedido</th>
                <th>ID del Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Precio Total</th>
                <th>Estatus del Pedido</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->product_id }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->unit_price }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection