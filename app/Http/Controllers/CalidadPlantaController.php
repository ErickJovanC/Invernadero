<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\calidadPlanta;
use Illuminate\Support\Facades\Auth;

class CalidadPlantaController extends Controller
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
        $fechaCorte = date('Y-m-d', strtotime($fechaActual."- 3 week"));
        $empleados = Auth::user()->empleados;
        return view('calidadPlanta.index')->
            with([
                'fechaActual' => $fechaActual,
                'fechaCorte' => $fechaCorte,
                'empleados' => $empleados,
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
        // Validación
        $data = request()->validate([
            'fechaCorte' => 'required',
            'fechaRecepcion' => 'required',
            'origenPlanta' => 'required',
            'cantidadPlantas' => 'required',
            'variedadPlanta' => 'required',
            'lote' => 'required',
            'responsable' => 'required',
        ]);
            // dd($request);
        // Insersión
        Auth::user()->planta()->create([
            'fechaCorte' => $data['fechaCorte'],
            'fechaRecepcion' => $data['fechaRecepcion'],
            'origenPlanta' => $data['origenPlanta'],
            'cantidadPlantas' => $data['cantidadPlantas'],
            'variedadPlanta' => $data['variedadPlanta'],
            'lote' => $request['lote'],
            'resistenciaPlagas' => $request['resistenciaPlagas'],
            'toleranciaPlagas' => $request['toleranciaPlagas'],
            'certificado' => $request['certificado'],
            'empleado_id' => $request['responsable'],
        ]);
        
        $mensaje = "Lote de Plantas registrado";
        return redirect(route('main'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\calidadPlanta  $calidadPlanta
     * @return \Illuminate\Http\Response
     */
    public function show(calidadPlanta $calidadPlanta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\calidadPlanta  $calidadPlanta
     * @return \Illuminate\Http\Response
     */
    public function edit(calidadPlanta $calidadPlanta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\calidadPlanta  $calidadPlanta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, calidadPlanta $calidadPlanta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\calidadPlanta  $calidadPlanta
     * @return \Illuminate\Http\Response
     */
    public function destroy(calidadPlanta $calidadPlanta)
    {
        //
    }
}
