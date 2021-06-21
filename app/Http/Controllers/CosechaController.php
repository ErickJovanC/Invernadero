<?php

namespace App\Http\Controllers;

use App\Models\Cosecha;
use App\Models\Seccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CosechaController extends Controller
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
        $empleados = Auth::user()->empleados;
        $secciones = Auth::User()->secciones;
        $clientes = Auth::User()->clientes;
        return view('srhigo.cosecha')->
            with([
                'fechaActual' => $fechaActual,
                'empleados' => $empleados,
                'secciones' => $secciones,
                'clientes' => $clientes,
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
        $data = $request->validate([
            'fecha' => 'required',
            'huertaSeccion' => 'required',
            'kilos' => 'required',
            'taras' => 'required',
            'material' => 'required',
            'cliente' => 'required',
            'responsable' => 'required',
        ]);

        // Obtener la huerta y la sección
        $seccion = (int)$data['huertaSeccion'];
        $huertas = Seccion::where("id", $seccion)->get();
        foreach ($huertas as $huerta){
            $huerta_id = $huerta->propiedad_id;
        }

        Auth::user()->cosechas()->create([
            'fecha' => $data['fecha'],
            'huerta_id' => $huerta_id,
            'seccion_id' => $seccion,
            'kilos' => $data['kilos'],
            'merma' => $request['merma'],
            'horaInicio' => $request['horaInicio'],
            'horaFin' => $request['horaFin'],
            'tempFruta' => $request['tempFruta'],
            'tempSuelo' => $request['tempSuelo'],
            'taras' => $data['taras'],
            'materialCajas' => $data['material'],
            'cliente_id' => $data['cliente'],
            'empleado_id' => $data['responsable'],
        ]);

        return redirect('main')->with('mensaje', '¡La cosecha se ha registrado correctamente!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cosecha  $cosecha
     * @return \Illuminate\Http\Response
     */
    public function show(Cosecha $cosecha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cosecha  $cosecha
     * @return \Illuminate\Http\Response
     */
    public function edit(Cosecha $cosecha)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cosecha  $cosecha
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cosecha $cosecha)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cosecha  $cosecha
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cosecha $cosecha)
    {
        //
    }
}
