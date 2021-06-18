<?php

namespace App\Http\Controllers;

use App\Models\Estados;
use App\Models\Municipios;
use Illuminate\Http\Request;
use App\Models\RegistroPropiedad;
use Illuminate\Support\Facades\Auth;

class RegistroPropiedadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        // Se obtienen los valores de la BD
        $estados = Estados::all(['id', 'estado']);
        $municipios = Municipios::all(['id', 'municipio']);
        $huertas = Auth::user()->huertas;

        //Se envian los valores obtenidos a la vista
        return view('registroPropiedad.index')->
            with([
                'estados' => $estados,
                'municipios' => $municipios,
                'huertas' => $huertas,
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
        // Validación de datos
       
        $data = request()->validate([
            'nombreHuerta' => 'required | min:3',
            'estado' => 'required',
            'municipio' => 'required',
        ]);

        // Insersión a la BD
        auth()->user()->huertas()->create([
            'nombreHuerta' => $data['nombreHuerta'],
            'codigoRegistro' => $request['codigoRegistro'],
            'estado_id' => $data['estado'],
            'municipio_id' => $data['municipio'],
            'colonia' => $request['colonia'],
            'calle' => $request['calle'],
            'comunidad' => $request['comunidad'],
            'ubicacion' => $request['ubicacion'],
        ]);

        $huertas = Auth::user()->huertas;
        $secciones = Auth::user()->secciones;
        return view('srhigo.seccion')->
        with([
            'huertas' => $huertas,
            'secciones' => $secciones,
            'mensaje' => '¡La huerta a sido registrada correctamente! Ahora registre las secciones de su huerta'
            ]);

        // $estados = Estados::all(['id', 'estado']);
        // $municipios = Municipios::all(['id', 'municipio']);
        // $huertas = Auth::user()->huertas;
        // return view('registroPropiedad.index')->
        //     with([
        //         'estados' => $estados,
        //         'municipios' => $municipios,
        //         'huertas' => $huertas,
        //     ]);
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
        // dd($request->all());
        // return $registroPropiedad;
        $data = request()->validate([
            'nombreHuerta' => 'required | min:3',
            'estado' => 'required',
            'municipio' => 'required',
        ]);

        // Actualización
        $registroPropiedad->update([
            'nombreHuerta' => $data['nombreHuerta'],
            'codigoRegistro' => $request['codigoRegistro'],
            'estado_id' => $data['estado'],
            'municipio_id' => $data['municipio'],
            'colonia' => $request['colonia'],
            'calle' => $request['calle'],
            'comunidad' => $request['comunidad'],
            'ubicacion' => $request['ubicacion'],
        ]);

        // Redirección
        $estados = Estados::all(['id', 'estado']);
        $municipios = Municipios::all(['id', 'municipio']);
        $huertas = Auth::user()->huertas;
        return redirect('registroPropiedad/create')->
            with([
                'estados' => $estados,
                'municipios' => $municipios,
                'huertas' => $huertas,
                'mensaje' => '¡La huerta a sido actualizada correctamente!'
                ]);
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
