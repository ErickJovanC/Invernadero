<?php

namespace App\Http\Controllers;
use DateTime;

use App\Models\Seccion;
use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Models\RegistroRiego;
use Illuminate\Support\Facades\Auth;

class RegistroRiegoController extends Controller
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

    public function create()
    {
        $fechaActual = date('Y-m-d');
        $secciones = Auth::user()->secciones;
        $empleados = Auth::user()->empleados;
        // $empleados = Empleado::all(['id', 'nombreEmpleado', 'apellidoEmpleado', 'sobrenombreEmpleado']);
        return view('srhigo.registroRiego')->
            with([
                'secciones' => $secciones, 
                'fechaActual' => $fechaActual,
                'empleados' => $empleados
            ]);
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'huertaSeccion' => 'required',
            'metodoRiego' => 'required',
            'fuenteAgua' => 'required',
            'fecha' => 'required',
            'horaInicio' => 'required',
            'horaFin' => 'required',
            'litrosHora' => 'required',
            'responsable' => 'required',
            ]);

            $seccion = (int)$data['huertaSeccion'];
            $huertas = Seccion::where("id", $seccion)->get();
            foreach ($huertas as $huerta){
                $huerta_id = $huerta->propiedad_id;
            }

            $horaInicio = new DateTime ($request['horaInicio']);
            $horaFin = new DateTime ($request['horaFin']);
            $horas = $horaInicio->diff($horaFin);
            $horas = $horas->format('%h:%i');
            // dd($horas);

            Auth::user()->riego()->create([
                'huerta_id' => $huerta_id,
                'seccion_id' => $seccion,
                'metodoRiego' => $data['metodoRiego'],
                'fecha' => $data['fecha'],
                'horaInicio' => $data['horaInicio'],
                'horaFin' => $data['horaFin'],
                'horas' => $horas,
                'litrosHora' => $data['litrosHora'],
                'costo' => $request['costo'],
                'empleado_id' => $data['responsable'],
            ]);

            session()->put('mensaje', '¡El Riego se ha registrado correctamente!');
            return redirect('main');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegistroRiego  $registroRiego
     * @return \Illuminate\Http\Response
     */
    public function show(RegistroRiego $registroRiego)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegistroRiego  $registroRiego
     * @return \Illuminate\Http\Response
     */
    public function edit(RegistroRiego $registroRiego)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegistroRiego  $registroRiego
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegistroRiego $registroRiego)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegistroRiego  $registroRiego
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegistroRiego $registroRiego)
    {
        //
    }
}
