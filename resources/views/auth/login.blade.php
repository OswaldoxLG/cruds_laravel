@extends('layouts.app')

@section('content')
<div>
    <h2>INICIAR SESIÓN</h2>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error}}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('login.submit') }}" method="POST">
        @csrf
        <label for="email">Correo</label>
        <input type="email" name="email" id="" required>

        <label for="password">Contraseña</label>
        <input type="password" name="password" id="">

        <button type="submit">Iniciar sesión</button>
    </form>
</div>

@endsection