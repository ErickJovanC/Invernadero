<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use Illuminate\Http\Request;
use App\Models\CapacitacionPersonal;
use Illuminate\Support\Facades\Auth;

class CapacitacionPersonalController extends Controller
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
        $trabajadores = Auth::user()->empleados;
        return view('srhigo.capacitacionPersonal')
            ->with([
                'fechaActual' => $fechaActual,
                'secciones' => $secciones,
                'trabajadores' => $trabajadores,
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
            'huertaSeccion' => 'required',
            'fecha' => 'required',
            'nombreCurso' => 'required',
            'nombreCapacitador' => 'required',
            'tiempoCapacitacion' => 'required',
            'trabajadores' => 'required',
        ]);

        // Obtención de la huerta y sección
        $seccion = (int)$data['huertaSeccion'];
        $huertas = Seccion::where("id", $seccion)->get();
        foreach ($huertas as $huerta){
            $huerta_id = $huerta->propiedad_id;
        }

        Auth::user()->capacitacion()->create([
            'huerta_id' => $huerta_id,
            'fecha' => $data['fecha'],
            'nombreCurso' => $data['nombreCurso'],
            'capacitador' => $data['nombreCapacitador'],
            'empresa' => $request['empresaCapacitadora'],
            'tiempo' => $data['tiempoCapacitacion'],
            'empleados' => implode(', ', $data['trabajadores']),
        ]);

        return redirect('main')->with('mensaje', '¡La Capacitación del Personal se ha Registrado Correctamente!');
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
