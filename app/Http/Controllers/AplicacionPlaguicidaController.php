<?php

namespace App\Http\Controllers;

use App\Models\Plaga;
use App\Models\Seccion;
use App\Models\Plaguicida;
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

    public function create()
    {
        $fechaActual = date('Y-m-d');
        $secciones = Auth::user()->secciones;
        $empleados = Auth::user()->empleados;
        $plaguicidas = Plaguicida::where('user_id', 1)->orderBy('nombreComercial')->get();
        $plagas = Plaga::all();

        return view('srhigo.aplicacionPlaguicida')->
            with([
                'secciones' => $secciones, 
                'fechaActual' => $fechaActual,
                'empleados' => $empleados,
                'plaguicidas' => $plaguicidas,
                'plagas' => $plagas,
            ]);
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'plaguicida' => 'required',
            'fecha' => 'required',
            'huertaSeccion' => 'required',
            'plaga' => 'required',
            'horas' => 'required',
            'minutos' => 'required',
            'dosisAplicada' => 'required',
            'agua' => 'required',
            'clima' => 'required',
            'equipo' => 'required',
            'costo' => 'required',
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
            'plaga_id' => $data['plaga'],
            'horas' => $data['horas'],
            'minutos' => $data['minutos'],
            'dosisAplicada' => $data['dosisAplicada'],
            'agua' => $data['agua'],
            'clima' => $data['clima'],
            'equipo' => implode(', ', $data['equipo']),
            'costo' => $data['costo'],
            'empleado_id' => $data['responsable'],
        ]);

        session()->put('mensaje', '¡La Aplicación de Plaguicida se ha registrado correctamente!');
        return redirect('main');
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
