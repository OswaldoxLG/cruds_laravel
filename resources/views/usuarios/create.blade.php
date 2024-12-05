@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agregar Cliente</h1>

        <form action="" method="POST" id="form-usuario-funcion">
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

    <script>
        $(document).ready(function(){ 
    
    $('#form-usuario-funcion').on('submit', function(event){ 
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
                Swal.fire("¡Éxito!", "Usuario creado exitosamente.", "success").then(() => {
                        $('#form-usuario-funcion')[0].reset(); //vacia los campos del formulario
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


