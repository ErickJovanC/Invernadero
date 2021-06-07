<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LimpiezaCanales;
use Illuminate\Support\Facades\Auth;

class LimpiezaCanalesController extends Controller
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
        $huertas = Auth::user()->huertas;
        $empleados = Auth::user()->empleados;
        return view('srhigo.limpiezaCanales')->
            with([
                'huertas' => $huertas, 
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
        // dd($request->all());
        $data = request()->validate([
            'huerta' => 'required',
            'fecha' => 'required',
            'nombreCanal' => 'required',
            'longitudCanal' => 'required',
            'revestimiento' => 'required',
            'accion' => 'required',
            'responsable' => 'required',
        ]);

        Auth::user()->limpiezaCanales()->create([
            'huerta_id' => $request['huerta'],
            'fecha' => $request['fecha'],
            'nombreCanal' => $request['nombreCanal'],
            'longitud' => $request['longitudCanal'],
            'revestimiento' => $request['revestimiento'],
            'accionesRealizadas' => implode(', ', $request->accion),
            'observaciones' => $request['observaciones'],
            'empleado_id' => $request['responsable'],
        ]);

        return redirect(route('main'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LimpiezaCanales  $limpiezaCanales
     * @return \Illuminate\Http\Response
     */
    public function show(LimpiezaCanales $limpiezaCanales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LimpiezaCanales  $limpiezaCanales
     * @return \Illuminate\Http\Response
     */
    public function edit(LimpiezaCanales $limpiezaCanales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LimpiezaCanales  $limpiezaCanales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LimpiezaCanales $limpiezaCanales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LimpiezaCanales  $limpiezaCanales
     * @return \Illuminate\Http\Response
     */
    public function destroy(LimpiezaCanales $limpiezaCanales)
    {
        //
    }
}
