<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CapacitacionPersonal;
use Illuminate\Support\Facades\Auth;

class CapacitacionPersonalController extends Controller
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
        $secciones = Auth::user()->secciones;
        $trabajadores = Auth::user()->empleados;
        return view('srhigo.capacitacionPersonal')
            ->with([
                'fechaActual' => $fechaActual,
                'secciones' => $secciones,
                'trabajadores' => $trabajadores,
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
            'huertaSeccion' => 'required',
            'fecha' => 'required',
            'nombreCurso' => 'required',
            'nombreCapacitador' => 'required',
            'tiempoCapacitacion' => 'required',
            'trabajadores' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CapacitacionPersonal  $capacitacionPersonal
     * @return \Illuminate\Http\Response
     */
    public function show(CapacitacionPersonal $capacitacionPersonal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CapacitacionPersonal  $capacitacionPersonal
     * @return \Illuminate\Http\Response
     */
    public function edit(CapacitacionPersonal $capacitacionPersonal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CapacitacionPersonal  $capacitacionPersonal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CapacitacionPersonal $capacitacionPersonal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CapacitacionPersonal  $capacitacionPersonal
     * @return \Illuminate\Http\Response
     */
    public function destroy(CapacitacionPersonal $capacitacionPersonal)
    {
        //
    }
}
