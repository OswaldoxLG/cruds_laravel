@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Usuarios</h1>
        <a href="{{ route('usuarios.create') }}" class="btn btn-primary">Agregar Cliente</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->telefono }}</td>
                        <td>
                            <a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
{{ $usuarios->links('pagination::bootstrap-4')}}
@endsection
