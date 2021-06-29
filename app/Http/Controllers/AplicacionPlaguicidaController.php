<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
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
        $plaguicidas = Auth::user()->plaguicida;

        return view('srhigo.aplicacionPlaguicida')->
            with([
                'secciones' => $secciones, 
                'fechaActual' => $fechaActual,
                'empleados' => $empleados,
                'plaguicidas' => $plaguicidas,
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
            'plaguicida' => 'required',
            'fecha' => 'required',
            'huertaSeccion' => 'required',
            'horas' => 'required',
            'minutos' => 'required',
            'dosisAplicada' => 'required',
            'responsable' => 'required',
        ]);

        $seccion = (int)$data['huertaSeccion'];
        $huertas = Seccion::where("id", $seccion)->get();
        foreach ($huertas as $huerta){
            $huerta_id = $huerta->propiedad_id;
        }

        Auth::user()->aplicacionPlaguicida()->create([
            'plaguicida_id' => $data['plaguicida'],
            'fecha' => $data['fecha'],
            'huerta_id' => $huerta_id,
            'seccion_id' => $seccion,
            'horas' => $data['horas'],
            'minutos' => $data['minutos'],
            'dosisAplicada' => $data['dosisAplicada'],
            'empleado_id' => $data['responsable'],
        ]);

        return redirect('main')->with('mensaje', '¡La Aplicación de Plaguicida se ha registrado correctamente!');
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
