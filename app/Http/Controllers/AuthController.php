<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showRegisterForm() {
        return view('auth.register');
    }

    public function register(Request $request) {
        //validad los datos del formulario
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:50',
            'email' => 'required|string|email|max:50',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telefono' => $request->telefono ?? '',
            'direccion' => $request->direccion ?? '',
            'rol' => 'cliente',
        ]);
        //redirigir al usuario a la pagina de inicio de sesion
        return redirect()->route('login')->with('success', 'Registro exitoso. Por favor, inicia sesión.');
    }

    public function showLoginForm() {
        return view('auth.login');
    }

    public function login(Request $request) {
        //validad los datos del formulario

        $credenciales = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credenciales)){
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->withErrors(['error' => 'Credenciales incorrectas']);
        }
    }
    //Cerrar sesión
    public function logout() { 
        Auth::logout();
        return redirect()->route('login')->with('success', 'Has cerrado sesión.');
    }


}
