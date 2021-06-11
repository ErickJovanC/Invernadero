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
            'huertaSeccion' => 'required',
            'equipo' => 'required',
            'productoAplicado' => 'required',
            'repeticion' => 'required',
            'recipiente' => 'required',
            'volumenPesoInicial' => 'required',
            'volumenPesoFinal' => 'required',
            'longitudRecorrida' => 'required',
            'anchoCubierto' => 'required',
            'responsable' => 'required',
        ]);

        // Obtenención de la huerta y la sección
        $seccion = (int)$data['huertaSeccion'];
        $huertas = Seccion::where("id", $seccion)->get();
        foreach ($huertas as $huerta){
            $huerta_id = $huerta->propiedad_id;
        }

        $gastoEquipo = $data['repeticion'] * $data['recipiente'] + ($data['volumenPesoInicial'] - $data['volumenPesoFinal']);
        $area = $data['longitudRecorrida'] * $data['anchoCubierto'];
        $gastoManzana = 7000 * $gastoEquipo / $area;

        Auth::user()->calibracionEquipo()->create([
            'fecha' => $data['fecha'],
            'huerta_id' => $huerta_id,
            'seccion_id' => $seccion,
            'equipo' => $data['equipo'],
            'producto' => $data['productoAplicado'],
            'repeticiones' => $data['repeticion'],
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
