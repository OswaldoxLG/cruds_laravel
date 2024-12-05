@extends('layouts.app')

@section('content')
    <h1>Crear Factura</h1>
    <form action="{{ route('facturas.store') }}" method="POST" id="createFacturaForm">
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
    
    <script>
        $(document).ready(function(){ 
    
    $('#createFacturaForm').on('submit', function(event){ 
        event.preventDefault() //se encarga de que la pagina NO se recargue 
    
        if ($('#emisor').val() === '') {
                Swal.fire("¡Error!", "Por favor, ingresa un emisor.", "error"); 
                return; 
            }
    
        var data = $(this).serialize(); //junta los campos del formulario en una URL
        console.log(data)
    
        var url = $(this).attr('action') 
        console.log(url) 
    
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            
            //manejar la respuesta del servidor
            success: function(response){
                Swal.fire("¡Éxito!", "Factura creada exitosamente.", "success").then(() => {
                        $('#createFacturaForm')[0].reset(); //vacia los campos del formulario
                });
            },
            //manejar errores
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
