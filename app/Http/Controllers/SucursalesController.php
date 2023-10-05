<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursale;

class SucursalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $Sucursales = Sucursale::all();
        return view('sucursales.index', compact('Sucursales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('sucursales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $datosSucursal = new Sucursale;
        $datosSucursal->suc_nombre = $request->input('suc_nombre');
        $datosSucursal->suc_direccion = $request->input('suc_direccion');
        $datosSucursal->save();
        return redirect()->route('sucursales.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($Sucursale)
    {
        //
        $Sucursal = Sucursale::find($Sucursale);
        return view('sucursales.edit', compact('Sucursal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $sucursalId)
    {
        //
        $datosSucursal = Sucursale::find($sucursalId);
        $datosSucursal->suc_nombre = $request->input('suc_nombre');
        $datosSucursal->suc_direccion = $request->input('suc_direccion');
        $datosSucursal->update();
        return redirect()->route('sucursales.index');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy($roleId)
     {
         //
         $datosRol=Sucursale::find($roleId);
         $datosRol->delete();
         return redirect()->route('sucursales.index');
     }
}
