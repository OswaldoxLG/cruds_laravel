@extends('layouts.app')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@section('content')
    <div class="container">
        <h1 class="text-center">Editar Usuario</h1>
        <form action="{{ route('usuarios.update', $usuario) }}" method="POST" id="updateForm">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $usuario->nombre }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ $usuario->email }}" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" id="telefono" name="telefono" class="form-control" value="{{ $usuario->telefono }}" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <textarea id="direccion" name="direccion" class="form-control" required>{{ $usuario->direccion }}</textarea>
            </div>
            <button type="submit" class="btn btn-success w-100">Actualizar Usuario</button>
        </form>
    </div>
    <script>
        $(document).ready(function(){
            $('#updateForm').on('submit', function(event){
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
                        Swal.fire("¡Éxito!", "Usuario editado exitosamente.", "success").then(() => {
                                $('#updateForm')[0].reset(); 
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
