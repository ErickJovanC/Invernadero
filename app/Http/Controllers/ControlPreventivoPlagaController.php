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
        $plagas = Plaga::all();
        // dd($secciones->all());
        return view('srhigo.controlPreventivoPlagas')->
            with([
                'secciones' => $secciones, 
                'fechaActual' => $fechaActual,
                'empleados' => $empleados,
                'plagas' => $plagas,
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
            'acciones',
            'empleado_id' => $data['responsable'],
        ]);

        return redirect(route('main'));
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
