@extends('layouts.app')
@section('content')
<div>
    <h1>Registro</h1>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('registro.submit') }}" method="POST">
        @csrf
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="" required>

        <label for="email">Correo</label>
        <input type="email" name="email" id="">

        <label for="password">Contraseña</label>
        <input type="password" name="password" id="">

        <label for="password_confirmation">Confirmar contraseña</label>
        <input type="password" name="password_confirmation" id="">

        <button type="submit">Registrarse</button>
    </form>
</div>
@endsection