<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AplicacionFertilizanteOrganico;

class AplicacionFertilizanteOrganicoController extends Controller
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
        $empleados = Empleado::all(['id', 'nombreEmpleado', 'apellidoEmpleado', 'sobrenombreEmpleado']);
        return view('srhigo.aplicacionFertilizanteOrganico')->
            with([
                'secciones' => $secciones, 
                'fechaActual' => $fechaActual,
                'empleados' => $empleados
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
            'cantidadAplicada' => 'required',
            'superficie' => 'required',
            'tipoFertilizante' => 'required',
            'responsable' => 'required',
        ]);

        $seccion = (int)$data['huertaSeccion'];
        $huertas = Seccion::where("id", $seccion)->get();
        foreach ($huertas as $huerta){
            $huerta_id = $huerta->propiedad_id;
        }

        Auth::user()->fertilizanteOrganico()->create([
            'fecha' => $data['fecha'],
            'huerta_id' => $huerta_id,
            'seccion_id' => $seccion,
            'cantidadAplicada' => $data['cantidadAplicada'],
            'superficie' => $data['superficie'],
            'tipoFertilizante' => $data['tipoFertilizante'],
            'empleado_id' => $data['responsable'],
        ]);

        return redirect(route('main'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AplicacionFertilizanteOrganico  $aplicacionFertilizanteOrganico
     * @return \Illuminate\Http\Response
     */
    public function show(AplicacionFertilizanteOrganico $aplicacionFertilizanteOrganico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AplicacionFertilizanteOrganico  $aplicacionFertilizanteOrganico
     * @return \Illuminate\Http\Response
     */
    public function edit(AplicacionFertilizanteOrganico $aplicacionFertilizanteOrganico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AplicacionFertilizanteOrganico  $aplicacionFertilizanteOrganico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AplicacionFertilizanteOrganico $aplicacionFertilizanteOrganico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AplicacionFertilizanteOrganico  $aplicacionFertilizanteOrganico
     * @return \Illuminate\Http\Response
     */
    public function destroy(AplicacionFertilizanteOrganico $aplicacionFertilizanteOrganico)
    {
        //
    }
}
