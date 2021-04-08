<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Models\CalidadPlanta;
use App\Models\CalibracionEquipo;

class CalibracionEquipoController extends Controller
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
        return view('srhigo.calibracionEquipo')->
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
            'fechaSiembra' => 'required',
            'equipo' => 'required',
            'productoAplicado' => 'required',
            'volumenPesoInicial' => 'required',
            'volumenPesoFinal' => 'required',
            'LongitudRecorrida' => 'required',
            'AnchoCubierto' => 'required',
            'responsable' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CalibracionEquipo  $calibracionEquipo
     * @return \Illuminate\Http\Response
     */
    public function show(CalibracionEquipo $calibracionEquipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CalibracionEquipo  $calibracionEquipo
     * @return \Illuminate\Http\Response
     */
    public function edit(CalibracionEquipo $calibracionEquipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CalibracionEquipo  $calibracionEquipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CalibracionEquipo $calibracionEquipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CalibracionEquipo  $calibracionEquipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(CalibracionEquipo $calibracionEquipo)
    {
        //
    }
}
