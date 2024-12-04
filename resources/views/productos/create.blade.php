@extends('layouts.app')

@section('content')
    <h1>Crear producto nuevo</h1>
    <form action="{{ route('productos.store') }}" method="POST" id="createProductForm">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
        </div>
        <button type="submit">Crear</button>
    </form>
@endsection
