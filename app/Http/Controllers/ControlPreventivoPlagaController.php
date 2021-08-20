<?php

namespace App\Http\Controllers;

use App\Models\Plaga;
use App\Models\Seccion;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ControlPreventivoPlaga;

class ControlPreventivoPlagaController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $fechaActual = date('Y-m-d');
        $secciones = Auth::user()->secciones;
        $empleados = Auth::user()->empleados;
        $plagas = Plaga::all();
        return view('srhigo.controlPreventivoPlagas')->
            with([
                'secciones' => $secciones, 
                'fechaActual' => $fechaActual,
                'empleados' => $empleados,
                'plagas' => $plagas,
            ]);
    }

    public function store(Request $request)
    {
        // dd(request());
        $data = request()->validate([
            'huertaSeccion' => 'required',
            'plagas' => 'required',
            'fecha' => 'required',
            'accionPreventiva' => 'required',
            'responsable' => 'required',
        ]);

        $seccion = (int)$data['huertaSeccion'];
        $huertas = Seccion::where("id", $seccion)->get();
        foreach ($huertas as $huerta){
            $huerta_id = $huerta->propiedad_id;
        }

        Auth::user()->controlPreventivoArbol()->create([
            'fecha' => $data['fecha'],
            'huerta_id' => $huerta_id,
            'seccion_id'=> $seccion,
            'plagas' => implode(', ', $request->plagas),
            'acciones' => implode(', ', $request->accionPreventiva),
            'costo' => $request['costo'],
            'empleado_id' => $data['responsable'],
        ]);

        session()->put('mensaje', '¡La Acción Preventiva de Plantas y Arboles se ha registrado correctamente!');
        return redirect('main');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ControlPreventivoPlaga  $controlPreventivoPlaga
     * @return \Illuminate\Http\Response
     */
    public function show(ControlPreventivoPlaga $controlPreventivoPlaga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ControlPreventivoPlaga  $controlPreventivoPlaga
     * @return \Illuminate\Http\Response
     */
    public function edit(ControlPreventivoPlaga $controlPreventivoPlaga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ControlPreventivoPlaga  $controlPreventivoPlaga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ControlPreventivoPlaga $controlPreventivoPlaga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ControlPreventivoPlaga  $controlPreventivoPlaga
     * @return \Illuminate\Http\Response
     */
    public function destroy(ControlPreventivoPlaga $controlPreventivoPlaga)
    {
        //
    }
}
