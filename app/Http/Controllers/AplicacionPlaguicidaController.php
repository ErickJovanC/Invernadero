<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\aplicacionPlaguicida;
use Illuminate\Support\Facades\Auth;

class AplicacionPlaguicidaController extends Controller
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
        // $plagas = Plaga::all();
        // dd($secciones->all());
        return view('srhigo.aplicacionPlaguicida')->
            with([
                'secciones' => $secciones, 
                'fechaActual' => $fechaActual,
                'empleados' => $empleados,
                // 'plagas' => $plagas,
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
            'fecha' => 'required',
            'tiempoAplicacion' => 'required',
            'tipoPlaguicida' => 'required',
            'nombreComercial' => 'required',
            'ingredienteActivo' => 'required',
            'colorBanda' => 'required',
            'dosisAplicada' => 'required',
            'responsable' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\aplicacionPlaguicida  $aplicacionPlaguicida
     * @return \Illuminate\Http\Response
     */
    public function show(aplicacionPlaguicida $aplicacionPlaguicida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\aplicacionPlaguicida  $aplicacionPlaguicida
     * @return \Illuminate\Http\Response
     */
    public function edit(aplicacionPlaguicida $aplicacionPlaguicida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\aplicacionPlaguicida  $aplicacionPlaguicida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, aplicacionPlaguicida $aplicacionPlaguicida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\aplicacionPlaguicida  $aplicacionPlaguicida
     * @return \Illuminate\Http\Response
     */
    public function destroy(aplicacionPlaguicida $aplicacionPlaguicida)
    {
        //
    }
}
