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

    <script>
        $(document).ready(function(){ 
    
    $('#createProductForm').on('submit', function(event){ 
        event.preventDefault() //se encarga de que la pagina NO se recargue 
    
        //Alerta, si el campo nombre no se llena 
        if ($('#nombre').val() === '') {
                Swal.fire("¡Error!", "Por favor, ingresa un nombre.", "error"); 
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
                Swal.fire("¡Éxito!", "Producto creado exitosamente.", "success").then(() => {
                        $('#createProductForm')[0].reset(); //vacia los campos del formulario
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
