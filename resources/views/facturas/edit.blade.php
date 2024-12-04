@extends('layouts.app')

@section('content')
    <h1>Editar Factura</h1>
    <form action="{{ route('facturas.update', $factura->id) }}" method="POST" id="editFacturaForm">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="fecha_emision">Fecha de Emisión</label>
            <input type="date" name="fecha_emision" class="form-control" value="{{$factura->fecha_emision}}" required>
        </div>
        <div class="form-group">
            <label for="emisor">Emisor</label>
            <input type="text" name="emisor" class="form-control" value="{{$factura->emisor}}" required>
        </div>
        <div class="form-group">
            <label for="receptor">Receptor</label>
            <input type="text" name="receptor" class="form-control" value="{{$factura->receptor}}" required>
        </div>
        <div class="form-group">
            <label for="importe_total">Importe Total</label>
            <input type="number" name="importe_total" class="form-control" value="{{$factura->importe_total}}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
    </form>
@endsection

