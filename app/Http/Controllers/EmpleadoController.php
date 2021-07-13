<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpleadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
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
        $nivelReg = Auth::user();
        // return $nivelReg->nivelRegistro;
        if($nivelReg->nivelRegistro < 5 ){
            if($nivelReg->nivelRegistro == 2){
                $huertas = Auth::user()->huertas;
                $secciones = Auth::user()->secciones;
                $url = view('primerRegistro.seccion')->
                    with([
                        'huertas' => $huertas,
                        'secciones' => $secciones,
                        'mensaje' => 'Antes de Continuar debe Registrar al menos una Sección',
                    ]);
            }
            else{
                $url = redirect('/enrutador');
            }
        }
        else{
            $empleados = Auth::user()->empleados;
            $url = view('srhigo.empleados')->
            with([
                    'empleados' => $empleados,
                ]);
        }
        // dd($url);
        return $url;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validación 
        $data = request()->validate([
            'nombreEmpleado' => 'required | min:3',
            'apellidoEmpleado' => 'required | min:3',
        ]);

        //Envio a la BD
        Auth::user()->empleados()->create([
            'nombreEmpleado' => $data['nombreEmpleado'],
            'apellidoEmpleado' => $data['apellidoEmpleado'],
            'sobrenombreEmpleado' => $request['sobrenombreEmpleado'],
        ]);
        
        // Consulta el nivel de registro y redirecciona conforme el estado del usuario
        $nivelReg = Auth::user();
        if($nivelReg->nivelRegistro < 5){
            User::where('id', $nivelReg->id)->update([
                'nivelRegistro' => 4,
            ]);
            $empleados = Auth::user()->empleados;
            $url = view('primerRegistro.empleados')->
            with([
                    'empleados' => $empleados,
                    'mensaje' => '¡El empleado se registro correctamente!'
                ]);
        }
        else{
            $empleados = Auth::user()->empleados;
            $url = view('srhigo.empleados')->
            with([
                    'empleados' => $empleados,
                    'mensaje' => '¡El empleado se registro correctamente!'
                ]);
        }
        return $url;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        return view('srhigo.empleadosEdit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        //Validación 
        $data = request()->validate([
            'nombreEmpleado' => 'required | min:3',
            'apellidoEmpleado' => 'required | min:3',
        ]);

        //Envio a la BD
        $empleado->update([
            'nombreEmpleado' => $data['nombreEmpleado'],
            'apellidoEmpleado' => $data['apellidoEmpleado'],
            'sobrenombreEmpleado' => $request['sobrenombreEmpleado'],
        ]);
        
        $empleados = Auth::user()->empleados;
        return view('srhigo.empleados')->
        with([
                'empleados' => $empleados,
                'mensaje' => '¡El empleado se actualizo correctamente!'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
    }
}
