<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $Roles = Role::all();
        return view('roles.index', compact('Roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $datosRol = new Role;
        $datosRol->rol_name = $request->input('rol_name');
        $datosRol->rol_description = $request->input('rol_description');
        $datosRol->save();
        return redirect()->route('roles.index');
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
    public function edit($Rol)
    {
        //
        $Rol = Role::find($Rol);
        return view('roles.edit', compact('Rol'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $rolId)
    {
        //
        $datosRol = Role::find($rolId);
        $datosRol->rol_name = $request->input('rol_name');
        $datosRol->rol_description = $request->input('rol_description');
        $datosRol->update();
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($roleId)
    {
        //
        $datosRol=Role::find($roleId);
        $datosRol->delete();
        return redirect()->route('roles.index');
    }
}
