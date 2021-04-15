<?php

namespace App\Http\Controllers;

use App\Models\Plaga;
use Illuminate\Http\Request;
use App\Models\IdentificacionPlagas;
use Illuminate\Support\Facades\Auth;

class IdentificacionPlagasController extends Controller
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
        $empleados = Auth::user()->empleados;
        $plagas = Plaga::all();
        // dd($secciones->all());
        return view('srhigo.identificacionPlagas')->
            with([
                'secciones' => $secciones, 
                'fechaActual' => $fechaActual,
                'empleados' => $empleados,
                'plagas' => $plagas,
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
            'variedad' => 'required',
            'periodoMonitoreo' => 'required',
            'plaga' => 'required',
            'unidadMuestreo' => 'required',
            'danioPlaga' => 'required',
            'cantidadEncontrada' => 'required',
            'responsable' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IdentificacionPlagas  $identificacionPlagas
     * @return \Illuminate\Http\Response
     */
    public function show(IdentificacionPlagas $identificacionPlagas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IdentificacionPlagas  $identificacionPlagas
     * @return \Illuminate\Http\Response
     */
    public function edit(IdentificacionPlagas $identificacionPlagas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IdentificacionPlagas  $identificacionPlagas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IdentificacionPlagas $identificacionPlagas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IdentificacionPlagas  $identificacionPlagas
     * @return \Illuminate\Http\Response
     */
    public function destroy(IdentificacionPlagas $identificacionPlagas)
    {
        //
    }
}
