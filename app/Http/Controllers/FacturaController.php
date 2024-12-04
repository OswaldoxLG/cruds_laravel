<?php

namespace App\Http\Controllers;
use App\Models\Factura;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FacturaController extends Controller
{
    public function index()
    {
        $facturas = Factura::paginate(3);
        return view('facturas.index', compact('facturas'));
    }

    public function create()
    {
        return view('facturas.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'fecha_emision' => 'required|date',
            'emisor' => 'required|string|max:50',
            'receptor' => 'required|string|max:50',
            'importe_total' => 'required|numeric|min:0'
        ]);

        Factura::create([
            'fecha_emision' => $request->fecha_emision,
            'emisor' => $request->emisor,
            'receptor' => $request->receptor,
            'importe_total' => $request->importe_total
        ]);
        Alert::success('Éxito', 'La factura ha sido creado correctamente')->flash();
        return redirect()->route('facturas.index');
    }

    public function edit(Factura $factura)
    {
        return view('facturas.edit', compact('factura'));
    }

public function update(Request $request, Factura $factura) {
    $request->validate([
        'fecha_emision' => 'required|date',
        'emisor' => 'required|string|max:50',
        'receptor' => 'required|string|max:50',
        'importe_total' => 'required|numeric|min:0'
    ]);
    
    $factura->fecha_emision = $request->fecha_emision;
    $factura->emisor = $request->emisor;
    $factura->receptor = $request->receptor;
    $factura->importe_total = $request->importe_total;
    $factura->save();

    Alert::success('Éxito', 'La factura ha sido actualizado correctamente')->flash();
    return redirect()->route('facturas.index');
}
    public function destroy(Factura $factura)
    {
        $factura->delete();
        Alert::success('Éxito', 'La factura ha sido eliminado correctamente')->flash();
        return redirect()->route('facturas.index');
    }

}
