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
            'huertaSeccion' => 'required',
            'horas' => 'required',
            'minutos' => 'required',
            'tipoPlaguicida' => 'required',
            'nombreComercial' => 'required',
            'ingredienteActivo' => 'required',
            'colorBanda' => 'required',
            'dosisAplicada' => 'required',
            'responsable' => 'required',
        ]);

        $seccion = (int)$data['huertaSeccion'];
        $huertas = Seccion::where("id", $seccion)->get();
        foreach ($huertas as $huerta){
            $huerta_id = $huerta->propiedad_id;
        }

        Auth::user()->aplicacionPlaguicida()->create([
            'fecha' => $data['fecha'],
            'huerta_id' => $huerta_id,
            'seccion_id' => $seccion,
            'horas' => $data['horas'],
            'minutos' => $data['minutos'],
            'tipoPlaguicida' => $data['tipoPlaguicida'],
            'nombreComercial' => $data['nombreComercial'],
            'ingredienteActivo' => $data['ingredienteActivo'],
            'colorBanda' => $data['colorBanda'],
            'dosisAplicada' => $data['dosisAplicada'],
            'empleado_id' => $data['responsable'],
        ]);

        return redirect(route('main'));
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
