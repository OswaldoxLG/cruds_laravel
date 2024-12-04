<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::paginate(3);
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        //validar los datos datos
        $validated = $request->validate([
            'nombre' => 'required|max:25',
            'email' => 'required|email|max:25',
            'password' => 'required',
            'telefono' => 'string|max:12',
            'direccion' => 'string|max:100',
            'rol' => 'string'
        ]);
        //crear el usuario
        User::create([
            'nombre' => $validated['nombre'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'telefono' => $validated['telefono'],
            'direccion' => $validated['direccion'],
            'rol' => $validated['rol']
        ]);
        Alert::success('Éxito', 'El usuario ha sido creado correctamente')->flash();
        return redirect()->route('usuarios.index');
    }

    public function edit(User $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'nombre' => 'required|max:25',
            'email' => 'required|email|max:25',
            'telefono' => 'required|string|max:12',
            'direccion' => 'required|string|max:100',
        ]);

        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        $usuario->telefono = $request->telefono;
        $usuario->direccion = $request->direccion;
        $usuario->save();

        Alert::success('Éxito', 'El usuario ha sido actualizado correctamente')->flash();
        return redirect()->route('usuarios.index');
    }

    public function destroy(User $usuario)
    {
        $usuario = User::find($usuario);
        $usuario->delete();
        Alert::success('Éxito', 'El usuario ha sido eliminado correctamente')->flash();
        return redirect()->route('usuarios.index');

    }
}
