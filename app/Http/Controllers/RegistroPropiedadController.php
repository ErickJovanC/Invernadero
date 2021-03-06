<?php

namespace App\Http\Controllers;

use App\Models\Estados;
use App\Models\Municipios;
use Illuminate\Http\Request;
use App\Models\CalidadPlanta;
use App\Models\RegistroPropiedad;
use Illuminate\Foundation\Auth\User;
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
            'nombreHuerta' => 'required | min:3 | unique:registro_propiedads',
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

        // Consulta el nivel de registro y redirecciona conforme el estado del usuario
        $nivelReg = Auth::user();
        if($nivelReg->nivelRegistro < 5){
            $huertas = Auth::user()->huertas;
            $secciones = Auth::user()->secciones;
            User::where('id', $nivelReg->id)->update([
                'nivelRegistro' => 2,
            ]);
            $url = view('primerRegistro.seccion')->with([
                'huertas' => $huertas,
                'secciones' => $secciones,
                'mensaje' => '¡La huerta a sido registrada correctamente! <br>Ahora registre las secciones de su huerta',
            ]);
        }
        else{
            $url = redirect('seccion/create')->
                with([
                    'mensaje' => '¡La huerta a sido registrada correctamente! <br>Ahora registre las secciones de su huerta'
                    ]);
        }
        return $url;
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
        $huerta = $registroPropiedad;
        // dd($huerta);
        $estados = Estados::all(['id', 'estado']);
        $municipios = Municipios::all(['id', 'municipio']);
        return view('registroPropiedad.edit', compact('estados', 'municipios', 'huerta'));
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
            'nombreHuerta' => 'required | min:3 | unique:registro_propiedads',
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
