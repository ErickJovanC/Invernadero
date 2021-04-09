<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Models\RegistroRiego;
use Illuminate\Support\Facades\Auth;

class RegistroRiegoController extends Controller
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
        // $empleados = Empleado::all(['id', 'nombreEmpleado', 'apellidoEmpleado', 'sobrenombreEmpleado']);
        return view('srhigo.registroRiego')->
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
            'seccion' => 'required',
            'metodoRiego' => 'required',
            'fuenteAgua' => 'required',
            'fechaRiego' => 'required',
            'horaInicio' => 'required',
            'horaFin' => 'required',
            'tambosAgua' => 'required',
            'consumoEnergia' => 'required',
            'responsable' => 'required',
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegistroRiego  $registroRiego
     * @return \Illuminate\Http\Response
     */
    public function show(RegistroRiego $registroRiego)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegistroRiego  $registroRiego
     * @return \Illuminate\Http\Response
     */
    public function edit(RegistroRiego $registroRiego)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegistroRiego  $registroRiego
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegistroRiego $registroRiego)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegistroRiego  $registroRiego
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegistroRiego $registroRiego)
    {
        //
    }
}
