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
        return view('preparacionSuelo.index')
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
        // $fechaActual = date('Y-m-d');
        
        $data = request()->validate([
            'huertaSeccion' => 'required',
            'labor' => 'required',
            'fechaInicio' => 'required',
            'fechaFin' => 'required',
            'metodoUtilizado' => 'required',
            'empleado' => 'required',
        ]);
        
        $horasMaquinaria = $request['horasMaquinaria'] == null ?  0 : $request['horasMaquinaria'];
        $costoHora = $request['costoHora'] == null ?  0 : $request['costoHora'];
        $costoOperacion = $horasMaquinaria * $costoHora;
        $seccion = (int)$data['huertaSeccion'];
        
        $huertas = Seccion::where("id", $seccion)->get();
        
        foreach ($huertas as $huerta){
            $huerta_id = $huerta->propiedad_id;
        }

        auth()->user()->suelos()->create([
            'huerta_id' => $huerta_id,
            'seccion_id' => $seccion,
            'labor' => $data['labor'],
            'fechaInicio' => $data['fechaInicio'],
            'fechaFin' => $data['fechaFin'],
            'horasMaquinaria' => $horasMaquinaria,
            'costoHora' => $costoHora,
            'costoOperacion' => $costoOperacion,
            'metodoUtilizado' => $data['metodoUtilizado'],
            'empleado_id' => $data['empleado'],
        ]);

        return redirect('main')->with('mensaje', '¡La preparación de suelo se ha registrado correctamente!');
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

    public function seleccionarHuerta(Request $request)
    {
        //
    }
}
