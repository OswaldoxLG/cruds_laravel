<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::paginate(3);
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:80',
            'precio' => 'required|numeric',
            'descripcion' => 'string',
        ]);

        Producto::create([
            'nombre' => $validated['nombre'],
            'precio' => $validated['precio'],
            'descripcion' => $validated['descripcion'],
        ]);
        
        Alert::success('Éxito', 'El producto ha sido creado correctamente')->flash();
        return redirect()->route('productos.index');
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'descripcion' => 'string',
        ]);

        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
        $producto->save();

        Alert::success('Éxito', 'El producto ha sido actualizado correctamente')->flash();
        return redirect()->route('productos.index');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete($producto);
        Alert::success('Éxito', 'El producto ha sido eliminado correctamente')->flash();
        return redirect()->route('productos.index');
    }
}
