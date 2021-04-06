<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Models\CalidadPlanta;
use App\Models\RegistroSiembra;

class RegistroSiembraController extends Controller
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
        $empleados = Empleado::all([
            'id', 
            'nombreEmpleado', 
            'apellidoEmpleado', 
            'sobrenombreEmpleado']);

        return view('srhigo.registroSiembra')
            ->with([
                'fechaActual' => $fechaActual,
                'lotes' => $lotes,
                'empleados' => $empleados,
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
            'fechaSiembra' => 'required',
            'distanciaPlanta' => 'required',
            'distanciaVesana' => 'required',
            'riego' => 'required',
            'responsable' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegistroSiembra  $registroSiembra
     * @return \Illuminate\Http\Response
     */
    public function show(RegistroSiembra $registroSiembra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegistroSiembra  $registroSiembra
     * @return \Illuminate\Http\Response
     */
    public function edit(RegistroSiembra $registroSiembra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegistroSiembra  $registroSiembra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegistroSiembra $registroSiembra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegistroSiembra  $registroSiembra
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegistroSiembra $registroSiembra)
    {
        //
    }
}
