<?php

namespace App\Http\Controllers;

use App\Models\RegistroPropiedad;
use Illuminate\Http\Request;

class RegistroPropiedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('registroPropiedad.index');
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
        // Validación de datos
        $data = request()->validate([
            'nombreHuerta' => 'required | min:3',
            'estado' => 'required',
            'municipio' => 'required',
            'colonia' => 'required | Min:5',
            'calle' => 'required | Min:6',
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegistroPropiedad  $registroPropiedad
     * @return \Illuminate\Http\Response
     */
    public function show(RegistroPropiedad $registroPropiedad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegistroPropiedad  $registroPropiedad
     * @return \Illuminate\Http\Response
     */
    public function edit(RegistroPropiedad $registroPropiedad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegistroPropiedad  $registroPropiedad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegistroPropiedad $registroPropiedad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegistroPropiedad  $registroPropiedad
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegistroPropiedad $registroPropiedad)
    {
        //
    }
}
