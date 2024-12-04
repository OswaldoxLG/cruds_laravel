@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="page-title">Editar producto</h1>
        <form action="{{ route('productos.update', $producto) }}" method="POST" class="edit-form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="{{ $producto->nombre }}" required class="form-control">
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" name="precio" id="precio" value="{{ $producto->precio }}" required class="form-control">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcción:</label>
                <textarea name="descripcion" id="descripcion" class="form-control">{{ $producto->descripcion }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection

