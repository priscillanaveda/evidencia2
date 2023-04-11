@extends('layouts.app')

@section('content')
    <h1>Agregar Producto</h1>
    <hr>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="price">Precio:</label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="stock">Cantidad en almacén:</label>
            <input type="number" name="stock" id="stock" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection