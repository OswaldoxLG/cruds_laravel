@extends('layouts.app')

@section('content')
    <h1>Crear Factura</h1>
    <form action="{{ route('facturas.store') }}" method="POST" id="createInvoiceForm">
        @csrf
        <div class="form-group">
            <label for="fecha_emision">Fecha de Emisión</label>
            <input type="date" name="fecha_emision" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="emisor">Emisor</label>
            <input type="text" name="emisor" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="receptor">Receptor</label>
            <input type="text" name="receptor" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="importe_total">Importe Total</label>
            <input type="number" name="importe_total" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
    </form>
@endsection
