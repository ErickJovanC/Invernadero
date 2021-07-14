<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Models\CalidadPlanta;
use Illuminate\Support\Facades\Auth;
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
        $secciones = Auth::User()->secciones;
        $lotes = CalidadPlanta::all(['id', 'lote']);
        $empleados = Auth::User()->empleados;
        $fertilizantes = Auth::User()->registroFertilizante;
        return view('srhigo.aplicacionFertilizante')->
        with([
            'lotes' => $lotes, 
            'fechaActual' => $fechaActual,
            'empleados' => $empleados,
            'fertilizantes' => $fertilizantes,
            'secciones' => $secciones,
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
            'huertaSeccion' => 'required',
            'nombreFertilizante' => 'required',
            'unidades' => 'required',
            'precio' => 'required',
            'metodoAplicacion' => 'required',
            'responsable' => 'required',
        ]);

        $seccion = (int)$data['huertaSeccion'];
        $huertas = Seccion::where("id", $seccion)->get();
        foreach ($huertas as $huerta){
            $huerta_id = $huerta->propiedad_id;
        }

        Auth::user()->aplicacionFertilizante()->create([
            'fechaAplicacion' => $data['fecha'],
            'huerta_id' => $huerta_id,
            'seccion_id' => $seccion,
            'fertilizante_id' => $data['nombreFertilizante'],
            'unidades' => $data['unidades'],
            'precio' => $data['precio'],
            'metodoAplicacion' => $data['metodoAplicacion'],
            'empleado_id' => $data['responsable'],
        ]);
        session()->put('mensaje', '¡La Aplicación de Fertilizante se ha registrado correctamente!');
        return redirect('main');
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
