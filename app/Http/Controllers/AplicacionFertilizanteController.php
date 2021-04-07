<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Models\CalidadPlanta;
use App\Models\AplicacionFertilizante;

class AplicacionFertilizanteController extends Controller
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
        return view('srhigo.aplicacionFertilizante')->
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
            'fechaAplicacion' => 'required',
            'nombreFertilizante' => 'required',
            'kilosHectarea' => 'required',
            'metodoAplicacion' => 'required',
            'responsable' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AplicacionFertilizante  $aplicacionFertilizante
     * @return \Illuminate\Http\Response
     */
    public function show(AplicacionFertilizante $aplicacionFertilizante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AplicacionFertilizante  $aplicacionFertilizante
     * @return \Illuminate\Http\Response
     */
    public function edit(AplicacionFertilizante $aplicacionFertilizante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AplicacionFertilizante  $aplicacionFertilizante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AplicacionFertilizante $aplicacionFertilizante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AplicacionFertilizante  $aplicacionFertilizante
     * @return \Illuminate\Http\Response
     */
    public function destroy(AplicacionFertilizante $aplicacionFertilizante)
    {
        //
    }
}
