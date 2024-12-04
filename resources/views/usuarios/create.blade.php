@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agregar Cliente</h1>

        <form action="" method="POST" id="form-cliente-funcion">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Contreseña</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" id="telefono" name="telefono" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <textarea id="direccion" name="direccion" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="rol">Rol</label>
                <select name="rol" class="form-control" required>
                    <option value="cliente">Cliente</option>
                    <option value="administrador">administrador</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Guardar Usuario</button>
        </form>
    </div>

@endsection

