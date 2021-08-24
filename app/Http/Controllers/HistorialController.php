<?php

namespace App\Http\Controllers;

use App\Models\historial;
use Illuminate\Http\Request;
use App\Models\PreparacionSuelo;
use Illuminate\Support\Facades\Auth;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preparacionSuelo = Auth::user()->suelos;
        $calidadPlanta = Auth::user()->planta;
        $controlPreventivoPlanta = Auth::user()->controlPreventivoPlanta;
        $controlPreventivoArbol = Auth::user()->controlPreventivoArbol;
        $registroSiembra = Auth::user()->registroSiembra;
        $actividadesCulturales = Auth::user()->actividadesCulturales;
        $registroCosecha = Auth::user()->registroCosecha;
        $aplicacionFertilizante = Auth::user()->aplicacionFertilizante;
        $fertilizanteOrganico = Auth::user()->fertilizanteOrganico;
        $registroRiego = Auth::user()->riego;
        $limpiezaCanales = Auth::user()->limpiezaCanales;
        $identificacionPlagas = Auth::user()->identificacionPlagas;
        $aplicacionPlaguicida = Auth::user()->aplicacionPlaguicida;
        $capacitacionPersonal = Auth::user()->capacitacion;
        $cortePlantas = Auth::user()->cortePlanta;
        $calibracionEquipo = Auth::user()->calibracionEquipo;
        
        return view('srhigo.historialActividades')->
            with([
                'preparacionSuelo' => $preparacionSuelo,
                'calidadPlanta' => $calidadPlanta,
                'controlPreventivoPlanta' => $controlPreventivoPlanta,
                'controlPreventivoArbol' => $controlPreventivoArbol,
                'registroSiembra' => $registroSiembra,
                'actividadesCulturales' => $actividadesCulturales,
                'registroCosecha' => $registroCosecha,
                'aplicacionFertilizante' => $aplicacionFertilizante,
                'fertilizanteOrganico' => $fertilizanteOrganico,
                'registroRiego' => $registroRiego,
                'limpiezaCanales' => $limpiezaCanales,
                'identificacionPlagas' => $identificacionPlagas,
                'aplicacionPlaguicida' => $aplicacionPlaguicida,
                'capacitacionPersonal' => $capacitacionPersonal,
                'cortePlantas' => $cortePlantas,
                'calibracionEquipo' => $calibracionEquipo,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\historial  $historial
     * @return \Illuminate\Http\Response
     */
    public function show(historial $historial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\historial  $historial
     * @return \Illuminate\Http\Response
     */
    public function edit(historial $historial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\historial  $historial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, historial $historial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\historial  $historial
     * @return \Illuminate\Http\Response
     */
    public function destroy(historial $historial)
    {
        //
    }
}
