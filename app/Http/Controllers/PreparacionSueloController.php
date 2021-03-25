<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use Illuminate\Http\Request;
use App\Models\PreparacionSuelo;
use App\Models\RegistroPropiedad;
use Illuminate\Support\Facades\Auth;

class PreparacionSueloController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        // return 'Estoy en preparacion de suelo create';
        $huertas = Auth::user()->huertas;
        $secciones = Auth::user()->secciones;
        $empleados = Auth::user()->empleados;
        $fechaActual = date('Y-m-d');
        return view('PreparacionSuelo.index')
            ->with('huertas', $huertas)
            ->with('secciones', $secciones)
            ->with('empleados', $empleados)
            ->with('fechaActual', $fechaActual);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fechaActual = date('Y-m-d');
        $data = request()->validate([
            'propiedad' => 'required',
            'seccion' => 'required',
            'labor' => 'required',
            'fechaInicio' => 'required',
            'fechaFin' => 'required',
            'horasMaquinaria' => 'required',
            'costoHora' => 'required',
            'metodoUtilizado' => 'required',
            'empleado' => 'required',
            ]);

            $costoOperacion = $data['horasMaquinaria'] * $data['costoHora'];

        auth()->user()->suelos()->create([
            'huerta_id' => $data['propiedad'],
            'seccion_id' => $data['seccion'],
            'labor' => $data['labor'],
            'fechaInicio' => $data['fechaInicio'],
            'fechaFin' => $data['fechaFin'],
            'horasMaquinaria' => $data['horasMaquinaria'],
            'costoHora' => $data['costoHora'],
            'costoOperacion' => $costoOperacion,
            'metodoUtilizado' => $data['metodoUtilizado'],
            'empleado_id' => $data['empleado'],
        ]);

        return redirect( route('main'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PreparacionSuelo  $preparacionSuelo
     * @return \Illuminate\Http\Response
     */
    public function show(PreparacionSuelo $preparacionSuelo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PreparacionSuelo  $preparacionSuelo
     * @return \Illuminate\Http\Response
     */
    public function edit(PreparacionSuelo $preparacionSuelo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PreparacionSuelo  $preparacionSuelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PreparacionSuelo $preparacionSuelo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PreparacionSuelo  $preparacionSuelo
     * @return \Illuminate\Http\Response
     */
    public function destroy(PreparacionSuelo $preparacionSuelo)
    {
        //
    }

    public function seleccionarHuerta(Request $request){
        //
    }
}
