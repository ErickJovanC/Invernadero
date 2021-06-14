<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use Illuminate\Http\Request;
use App\Models\CalidadPlanta;
use App\Models\CalibracionEquipo;
use Illuminate\Support\Facades\Auth;

class CalibracionEquipoController extends Controller
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
        $lotes = CalidadPlanta::all(['id', 'lote']);
        $empleados = Auth::user()->empleados;
        $secciones = Auth::User()->secciones;
        return view('srhigo.calibracionEquipo')->
            with([
                'lotes' => $lotes, 
                'fechaActual' => $fechaActual,
                'empleados' => $empleados,
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
            'fecha' => 'required',
            'equipo' => 'required',
            'productoAplicado' => 'required',
            'recipiente' => 'required',
            'volumenPesoInicial' => 'required',
            'volumenPesoFinal' => 'required',
            'longitudRecorrida' => 'required',
            'anchoCubierto' => 'required',
            'responsable' => 'required',
        ]);

        $gastoEquipo = $data['recipiente'] + ($data['volumenPesoInicial'] - $data['volumenPesoFinal']);
        $area = $data['longitudRecorrida'] * $data['anchoCubierto'];
        $gastoManzana = 7000 * $gastoEquipo / $area;

        Auth::user()->calibracionEquipo()->create([
            'fecha' => $data['fecha'],
            'equipo' => $data['equipo'],
            'producto' => $data['productoAplicado'],
            'comentario' => $request['comentario'],
            'recipiente' => $data['recipiente'],
            'pesoInicial' => $data['volumenPesoInicial'],
            'pesoFinal' => $data['volumenPesoFinal'],
            'gastoEquipo' => $gastoEquipo,
            'longitud' => $data['longitudRecorrida'],
            'ancho' => $data['anchoCubierto'],
            'area' => $area,
            'gastoManzana' => $gastoManzana,
            'empleado_id' => $data['responsable'],
        ]);

        return redirect(route('main'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CalibracionEquipo  $calibracionEquipo
     * @return \Illuminate\Http\Response
     */
    public function show(CalibracionEquipo $calibracionEquipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CalibracionEquipo  $calibracionEquipo
     * @return \Illuminate\Http\Response
     */
    public function edit(CalibracionEquipo $calibracionEquipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CalibracionEquipo  $calibracionEquipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CalibracionEquipo $calibracionEquipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CalibracionEquipo  $calibracionEquipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(CalibracionEquipo $calibracionEquipo)
    {
        //
    }
}
