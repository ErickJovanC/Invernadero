<?php

namespace App\Http\Controllers;

use App\Models\Plaga;
use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Models\CalidadPlanta;
use App\Models\ControlPreventivo;
use Illuminate\Support\Facades\Auth;

class ControlPreventivoController extends Controller
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
        $lotes = CalidadPlanta::all(['id', 'lote', 'cantidadPlantas']);
        $plagas = Plaga::all();
        $empleados = Auth::user()->empleados;
        return view('srhigo.controlPreventivo')->
            with([
                'lotes' => $lotes, 
                'fechaActual' => $fechaActual,
                'empleados' => $empleados,
                'plagas' => $plagas
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
            'lotePlanta' => 'required',
            'plagas' => 'required',
            'fechaAccion' => 'required',
            'cantidadPlantas' => 'required',
            'accionPreventiva' => 'required',
            'costo' => 'required',
            'responsable' => 'required',
        ]);

        // dd($request->all());

        auth()->user()->controlPreventivoPlanta()->create([
            'lote_id' => $data['lotePlanta'],
            'plagasPrevenir' => implode(', ', $request->plagas),
            'fechaAccion' => $data['fechaAccion'],
            'cantidadPlantas' => $data['cantidadPlantas'],
            'accionPreventiva' => implode(', ', $request->accionPreventiva),
            'costo' => $request['costo'],
            'empleado_id' => $data['responsable'],
        ]);

        // return redirect(route('controlPreventivo.create'));
        return redirect('main')->with('mensaje', '¡La Acción Preventiva de Plantas se ha registrado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ControlPreventivo  $controlPreventivo
     * @return \Illuminate\Http\Response
     */
    public function show(ControlPreventivo $controlPreventivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ControlPreventivo  $controlPreventivo
     * @return \Illuminate\Http\Response
     */
    public function edit(ControlPreventivo $controlPreventivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ControlPreventivo  $controlPreventivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ControlPreventivo $controlPreventivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ControlPreventivo  $controlPreventivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ControlPreventivo $controlPreventivo)
    {
        //
    }
}
