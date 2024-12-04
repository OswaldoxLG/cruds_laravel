@extends('layouts.app')

@section('content')

    <h1>Lista de Facturas</h1>
    <a href="{{ route('facturas.create') }}" class="btn btn-primary">Crear Factura</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Fecha de Emisión</th>
                <th>Emisor</th>
                <th>Receptor</th>
                <th>Importe</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facturas as $factura)
                <tr>
                    <td>{{ $factura->fecha_emision }}</td>
                    <td>{{ $factura->emisor }}</td>
                    <td>{{ $factura->receptor }}</td>
                    <td>{{ $factura->importe_total }}</td>
                    <td>
                        <a href="{{ route('facturas.edit', $factura) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('facturas.destroy', $factura) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $facturas->links('pagination::bootstrap-4')}}

@endsection
