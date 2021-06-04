<?php

namespace App\Http\Controllers;

use App\Models\CalidadPlanta;
use App\Models\Seccion;
use Illuminate\Http\Request;
use App\Models\RegistroSiembra;
use Illuminate\Support\Facades\Auth;

class RegistroSiembraController extends Controller
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
        $lotes = Auth::user()->planta;
        $empleados = Auth::user()->empleados;

        return view('srhigo.registroSiembra')
            ->with([
                'fechaActual' => $fechaActual,
                'lotes' => $lotes,
                'empleados' => $empleados,
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
            'huertaSeccion' => 'required',
            'lotePlanta' => 'required',
            'cantidadPlantasSembradas' => 'required',
            'fechaSiembra' => 'required',
            'distanciaPlanta' => 'required',
            'distanciaVesana' => 'required',
            'riego' => 'required',
            'responsable' => 'required',
        ]);

        $seccion = (int)$data['huertaSeccion'];
        $huertas = Seccion::where("id", $seccion)->get();
        foreach ($huertas as $huerta){
            $huerta_id = $huerta->propiedad_id;
        }
        $lote = $data['lotePlanta'];
        $plantasSembradas = $data['cantidadPlantasSembradas'];

        Auth::user()->registroSiembra()->create([
            'huerta_id' => $huerta_id, 
            'seccion_id' => $seccion,
            'lote_id' => $lote,
            'cantidadPlantas' => $plantasSembradas,
            'fecha' => $data['fechaSiembra'],
            'distanciaPlanta' => $data['distanciaPlanta'],
            'distanciaVesana' => $data['distanciaVesana'],
            'riego' => $data['riego'],
            'empleado_id' => $data['responsable'],
        ]);

        $lotes = CalidadPlanta::where("id", $lote)->get();
        foreach ($lotes as $plantasLotes){
            $plantasLote = $plantasLotes->cantidadPlantas;
        }
        $plantasRestantes = $plantasLote - $plantasSembradas;

        CalidadPlanta::where("id", $lote)->update([
            'cantidadPlantas' => $plantasRestantes,
        ]);
        
        return redirect(route('main'));


        // return Route::put('calidadPlanta');
    }

    public function show(RegistroSiembra $registroSiembra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegistroSiembra  $registroSiembra
     * @return \Illuminate\Http\Response
     */
    public function edit(RegistroSiembra $registroSiembra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegistroSiembra  $registroSiembra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegistroSiembra $registroSiembra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegistroSiembra  $registroSiembra
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegistroSiembra $registroSiembra)
    {
        //
    }
}
