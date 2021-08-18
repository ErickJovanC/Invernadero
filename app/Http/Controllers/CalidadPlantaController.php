<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\calidadPlanta;
use Illuminate\Support\Facades\Auth;

class CalidadPlantaController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $fechaActual = date('Y-m-d');
        $fechaCorte = date('Y-m-d', strtotime($fechaActual."-3 week"));
        $empleados = Auth::user()->empleados;
        return view('calidadPlanta.index')->
            with([
                'fechaActual' => $fechaActual,
                'fechaCorte' => $fechaCorte,
                'empleados' => $empleados,
        ]);
    }

    public function store(Request $request)
    {
        // Validación
        $data = request()->validate([
            'fechaCorte' => 'required',
            'fechaRecepcion' => 'required',
            'origenPlanta' => 'required',
            'cantidadPlantas' => 'required',
            'variedadPlanta' => 'required',
            'lote' => 'required | unique:calidad_plantas',
            'costo' => 'required',
            'responsable' => 'required',
        ]);
        
        // Insersión
        Auth::user()->planta()->create([
            'fechaCorte' => $data['fechaCorte'],
            'fechaRecepcion' => $data['fechaRecepcion'],
            'origenPlanta' => $data['origenPlanta'],
            'cantidadPlantas' => $data['cantidadPlantas'],
            'porPlantar' => $data['cantidadPlantas'],
            'variedadPlanta' => $data['variedadPlanta'],
            'lote' => $request['lote'],
            'resistenciaPlagas' => $request['resistenciaPlagas'],
            'toleranciaPlagas' => $request['toleranciaPlagas'],
            'certificado' => $request['certificado'],
            'costo' => $data['costo'],
            'empleado_id' => $request['responsable'],
        ]);
        
        session()->put('mensaje', '¡Se ha registrado la recepción de planta de forma correca!');
        return redirect('main');
    }

    public function show(calidadPlanta $calidadPlanta)
    {
        //
    }

    public function edit(calidadPlanta $calidadPlanta)
    {
        //
    }

    public function update(Request $request, calidadPlanta $calidadPlanta)
    {
        //
    }

    public function destroy(calidadPlanta $calidadPlanta)
    {
        //
    }
}