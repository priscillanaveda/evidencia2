@extends('layouts.app')

@section('content')
    <h1>Editar Producto</h1>
    <hr>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">