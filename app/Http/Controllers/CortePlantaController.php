<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use App\Models\CortePlanta;
use Illuminate\Http\Request;
use App\Models\CalidadPlanta;
use Illuminate\Support\Facades\Auth;

class CortePlantaController extends Controller
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
        return view('srhigo.cortePlanta', compact('fechaActual', 'secciones', 'empleados'));
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
            'cantidad' => 'required | integer',
        ]);

        $seccion = (int)$data['huertaSeccion'];
        $huertas = Seccion::where("id", $seccion)->get();
        foreach ($huertas as $huertaItem){
            $huerta = $huertaItem->propiedad_id;
        }

        Auth::user()->cortePlanta()->create([
            'fecha' => $data['fecha'],
            'huerta_id' => $huerta,
            'seccion_id' => $seccion,
            'cantidad' => $data['cantidad'],
            'motivo' => $request['motivo'],
        ]);

        // Consultar Cantidad de Plantas en Lote
        $plantas = Seccion::where("id", $seccion)->get();
        foreach ($plantas as $plantasItem){
            $plantasTotales = $plantasItem->cantidadPlantas;
        }
        $plantasTotales = $plantasTotales - $data['cantidad'];

        // Actualizar cantidad de plantas de Lotes
        Seccion::where("id", $seccion)->update([
            'cantidadPlantas' => $plantasTotales,
        ]);

        return redirect('main')->with('mensaje', 'El Corte de Plantas se ha Registrado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CortePlanta  $cortePlanta
     * @return \Illuminate\Http\Response
     */
    public function show(CortePlanta $cortePlanta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CortePlanta  $cortePlanta
     * @return \Illuminate\Http\Response
     */
    public function edit(CortePlanta $cortePlanta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CortePlanta  $cortePlanta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CortePlanta $cortePlanta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CortePlanta  $cortePlanta
     * @return \Illuminate\Http\Response
     */
    public function destroy(CortePlanta $cortePlanta)
    {
        //
    }
}
