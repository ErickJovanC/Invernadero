<?php

namespace App\Http\Controllers;

use App\Models\Plaga;
use App\Models\Seccion;
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
            'fecha' => 'required',
            'huertaSeccion' => 'required',
            'periodoMonitoreo' => 'required',
            'plaga' => 'required',
            'unidadMuestreo' => 'required',
            'cantidadEncontrada' => 'required',
            'responsable' => 'required',
        ]);

        $seccion = (int)$data['huertaSeccion'];
        $huertas = Seccion::where("id", $seccion)->get();
        foreach ($huertas as $huerta){
            $huerta_id = $huerta->propiedad_id;
        }

        Auth::user()->identificacionPlagas()->create([
            'fecha' => $data['fecha'],
            'huerta_id' => $huerta_id,
            'seccion_id' => $seccion,
            'periodoMonitoreo' => $data['periodoMonitoreo'],
            'plaga' => $data['plaga'],
            'unidadMuestreo' => $data['unidadMuestreo'],
            'cantidadEncontrada' => $data['cantidadEncontrada'],
            'danioPlaga' => $request['danioPlaga'],
            'empleado_id' => $data['responsable'],
        ]);

        return redirect(route('main'));
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
