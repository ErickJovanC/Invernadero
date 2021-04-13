<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Models\CalidadPlanta;
use App\Models\ControlPreventivo;
use Illuminate\Support\Facades\Auth;

class ControlPreventivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fechaActual = date('Y-m-d');
        $lotes = CalidadPlanta::all(['id', 'lote']);
        $empleados = Empleado::all(['id', 'nombreEmpleado', 'apellidoEmpleado', 'sobrenombreEmpleado']);
        return view('srhigo.controlPreventivo')->
            with([
                'lotes' => $lotes, 
                'fechaActual' => $fechaActual,
                'empleados' => $empleados
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'lotePlanta' => 'required',
            'plagaControlar' => 'required',
            'fechaAccion' => 'required',
            'cantidadPlantas' => 'required',
            'accionPreventiva' => 'required',
            'costo' => 'required',
            'responsable' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ControlPreventivo  $controlPreventivo
     * @return \Illuminate\Http\Response
     */
    public function show(ControlPreventivo $controlPreventivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ControlPreventivo  $controlPreventivo
     * @return \Illuminate\Http\Response
     */
    public function edit(ControlPreventivo $controlPreventivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ControlPreventivo  $controlPreventivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ControlPreventivo $controlPreventivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ControlPreventivo  $controlPreventivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ControlPreventivo $controlPreventivo)
    {
        //
    }
}
