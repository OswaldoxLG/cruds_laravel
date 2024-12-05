@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="page-title">Editar producto</h1>
        <form action="{{ route('productos.update', $producto) }}" method="POST" id="edit-form-pro">
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
    <script>
        $(document).ready(function(){
            $('#edit-form-pro').on('submit', function(event){
                event.preventDefault()
    
                if ($('#nombre').val() === '') {
                        Swal.fire("¡Error!", "Por favor, ingresa un nombre.", "error"); 
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
                        Swal.fire("¡Éxito!", "Producto editado exitosamente.", "success").then(() => {
                                $('#edit-form-pro')[0].reset(); 
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

