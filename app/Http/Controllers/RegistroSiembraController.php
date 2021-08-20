<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use Illuminate\Http\Request;
use App\Models\CalidadPlanta;
use App\Models\RegistroSiembra;
use Illuminate\Support\Facades\DB;
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

    public function create()
    {
        $fechaActual = date('Y-m-d');
        $secciones = Auth::user()->secciones;
        $id = Auth::user()->id;
        $lotes = CalidadPlanta::where("cantidadPlantas", ">", "0")->where("user_id", $id)->get();
        $empleados = Auth::user()->empleados;

        return view('srhigo.registroSiembra')
            ->with([
                'fechaActual' => $fechaActual,
                'lotes' => $lotes,
                'empleados' => $empleados,
                'secciones' => $secciones,
            ]);
    }

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
            'costo' => $request['costo'],
            'empleado_id' => $data['responsable'],
        ]);

        // Consultar Cantidad de Plantas en Lote
        $lotes = CalidadPlanta::where("id", $lote)->get();
        foreach ($lotes as $loteItem){
            $plantasRestantes = $loteItem->cantidadPlantas;
        }
        $plantasRestantes = $plantasRestantes - $plantasSembradas;

        // Actualizar cantidad de plantas de Lotes
        CalidadPlanta::where("id", $lote)->update([
            'cantidadPlantas' => $plantasRestantes,
        ]);

        // Consultar Cantidad de Plantas en Sección
        $secciones = Seccion::where("id", $seccion)->get();
        foreach ($secciones as $seccionItem){
            $plantasTotales = $seccionItem->cantidadPlantas;
        }
        $plantasTotales = $plantasTotales + $plantasSembradas;

        // Actualizar cantidad de plantas en Sección
        Seccion::where("id", $seccion)->update([
            'cantidadPlantas' => $plantasTotales,
        ]);
        
        session()->put('mensaje', '¡El registro de siembra se ha agregado correctamente!');
        return redirect('main');


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
