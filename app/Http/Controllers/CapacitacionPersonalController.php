<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use Illuminate\Http\Request;
use App\Models\CapacitacionPersonal;
use Illuminate\Support\Facades\Auth;

class CapacitacionPersonalController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {   
        $fechaActual = date('Y-m-d');
        $huertas = Auth::user()->huertas;
        $trabajadores = Auth::user()->empleados;
        return view('srhigo.capacitacionPersonal')
            ->with([
                'fechaActual' => $fechaActual,
                'huertas' => $huertas,
                'trabajadores' => $trabajadores,
            ]);
    }


    public function store(Request $request)
    {
        $data = request()->validate([
            'huerta' => 'required',
            'fecha' => 'required',
            'nombreCurso' => 'required',
            'nombreCapacitador' => 'required',
            'tiempoCapacitacion' => 'required',
            'trabajadores' => 'required',
        ]);

        // Obtención de la huerta y sección
        // $seccion = (int)$data['huertaSeccion'];
        // $huertas = Seccion::where("id", $seccion)->get();
        // foreach ($huertas as $huerta){
        //     $huerta_id = $huerta->propiedad_id;
        // }

        Auth::user()->capacitacion()->create([
            'huerta_id' => $data['huerta'],
            'fecha' => $data['fecha'],
            'nombreCurso' => $data['nombreCurso'],
            'capacitador' => $data['nombreCapacitador'],
            'empresa' => $request['empresaCapacitadora'],
            'tiempo' => $data['tiempoCapacitacion'],
            'costo' => $request['costo'],
            'empleados' => implode(', ', $data['trabajadores']),
        ]);

        session()->put('mensaje', '¡La Capacitación del Personal se ha Registrado Correctamente!');
        return redirect('main');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CapacitacionPersonal  $capacitacionPersonal
     * @return \Illuminate\Http\Response
     */
    public function show(CapacitacionPersonal $capacitacionPersonal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CapacitacionPersonal  $capacitacionPersonal
     * @return \Illuminate\Http\Response
     */
    public function edit(CapacitacionPersonal $capacitacionPersonal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CapacitacionPersonal  $capacitacionPersonal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CapacitacionPersonal $capacitacionPersonal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CapacitacionPersonal  $capacitacionPersonal
     * @return \Illuminate\Http\Response
     */
    public function destroy(CapacitacionPersonal $capacitacionPersonal)
    {
        //
    }
}
