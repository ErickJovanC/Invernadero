<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Seccion;
use Illuminate\Http\Request;
use App\Models\RegistroPropiedad;
use Illuminate\Support\Facades\Auth;

class SeccionController extends Controller
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
        // Se obtienen los valores de la BD filtrados por usuario
        $huertas = Auth::user()->huertas;
        $secciones = Auth::user()->secciones;
        //Se envian los valores obtenidos a la vista
        return view('srhigo.seccion')->
            with([
                'huertas' => $huertas,
                'secciones' => $secciones,
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
            'propiedad' => 'required',
            'nombreSeccion' => 'required',
            'cantidadPlantas' => 'integer'
        ]);

        Auth::user()->secciones()->create([
            'nombreSeccion' => $data['nombreSeccion'],
            'propiedad_id' => $data['propiedad'],
            'cantidadPlantas' => $data['cantidadPlantas'],
        ]);

        // Consulta el nivel de registro y redirecciona conforme el estado del usuario
        $nivelReg = Auth::user();
        if($nivelReg->nivelRegistro < 5){
            $huertas = Auth::user()->huertas;
            $secciones = Auth::user()->secciones;
            User::where('id', $nivelReg->id)->update([
                'nivelRegistro' => 3,
            ]);
            $url = view('primerRegistro.seccion')->with([
                'huertas' => $huertas,
                'secciones' => $secciones,
                'mensaje' => '¡La sección se registro correctamente! Puede registrar mas secciones.<br>Despues proceda a registrar a los empleados presionando el botón correspondiente',
            ]);
        }
        else{
            // $huertas = Auth::user()->huertas;
            // $secciones = Auth::user()->secciones;
            $url = redirect('seccion/create')->
            with([
                // 'huertas' => $huertas,
                // 'secciones' => $secciones,
                'mensaje' => '¡La sección se registro correctamente!'
                ]);
        }
        return $url;
    }

    public function show(Seccion $seccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Seccion $seccion)
    {
        // dd('Edicion')
        $huertas = Auth::user()->huertas;
        return view('srhigo.seccionEdit', compact( 'huertas', 'seccion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seccion $seccion)
    {
        // dd('update');
        $data = request()->validate([
            'propiedad' => 'required',
            'nombreSeccion' => 'required',
            'cantidadPlantas' => 'integer'
        ]);

        $seccion->update([
            'propiedad_id' => $data['propiedad'],
            'nombreSeccion' => $data['nombreSeccion'],
            'cantidadPlantas' => $data['cantidadPlantas'],
        ]);

        $huertas = Auth::user()->huertas;
        $secciones = Auth::user()->secciones;
        return redirect('seccion/create')->
        with([
            'huertas' => $huertas,
            'secciones' => $secciones,
            'mensaje' => '¡La sección se actualizo correctamente!'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seccion $seccion)
    {
        //
    }
}
