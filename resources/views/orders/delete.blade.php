@extends('layouts.app')

@section('content')
    <h1>Eliminar Pedido</h1>
    <hr>
    <p>¿Está seguro que desea eliminar el pedido #{{ $order->id }}?</p>
    <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection