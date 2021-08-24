<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use Illuminate\Http\Request;
use App\Models\ActividadesCulturale;
use Illuminate\Support\Facades\Auth;

class ActividadesCulturaleController extends Controller
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
        return view('srhigo.actividadesCulturales')->
        with([
            'secciones' => $secciones, 
            'fechaActual' => $fechaActual,
            'empleados' => $empleados
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = request()->validate([
            'huertaSeccion' => 'required',
            'fecha' => 'required',
            'actividad' => 'required',
            'costo' => 'required',
            'responsable' => 'required',
        ]);

        // Obtener la huerta y la sección
        $seccion = (int)$data['huertaSeccion'];
        $huertas = Seccion::where("id", $seccion)->get();
        foreach ($huertas as $huerta){
            $huerta_id = $huerta->propiedad_id;
        }

        Auth::user()->actividadesCulturales()->create([
            'huerta_id' => $huerta_id,
            'seccion_id' => $seccion,
            'fecha' => $request['fecha'],
            'actividad' => $request['actividad'],
            'costo' => $request['costo'],
            'comentario' => $request['comentario'],
            'empleado_id' => $request['responsable'],
        ]);
        session()->put('mensaje', '¡La actividad cultural se registro con éxito!');
        return redirect('main');
    }

    public function show(ActividadesCulturale $actividadesCulturale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActividadesCulturale  $actividadesCulturale
     * @return \Illuminate\Http\Response
     */
    public function edit(ActividadesCulturale $actividadesCulturale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActividadesCulturale  $actividadesCulturale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActividadesCulturale $actividadesCulturale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActividadesCulturale  $actividadesCulturale
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActividadesCulturale $actividadesCulturale)
    {
        //
    }
}
