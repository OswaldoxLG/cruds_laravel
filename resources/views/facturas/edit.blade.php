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
    <script>
        $(document).ready(function(){
            $('#editFacturaForm').on('submit', function(event){
                event.preventDefault()
    
                if ($('#emisor').val() === '') {
                        Swal.fire("¡Error!", "Por favor, ingresa un emisor.", "error"); 
                        return; 
                    }
    
                var data = $(this).serialize();
                console.log(data)
                
                var url = $(this).attr('action')
                console.log(url)
    
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    headers: { 'X-HTTP-Method-Override': 'PUT'}, //indicar al servidor que la solicitud debe tratarse como una solicitud PUT

                    success: function(response){
                        Swal.fire("¡Éxito!", "Factura editada exitosamente.", "success").then(() => {
                                $('#editFacturaForm')[0].reset(); 
                        });
                    },
                    error: function(xhr){
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                        Swal.fire("¡Error!", value[0], "error"); 
                        });
                    }
                });
            });
        });
        </script>
@endsection

