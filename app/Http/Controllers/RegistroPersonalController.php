<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistroPersonal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RegistroPersonalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/registroPersonal/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  Validación de datos
        $data = request()->validate([
            'nombre' => 'required | min:3',
            'apellidoPaterno' => 'required | min:4',
            'apellidoMaterno' => 'required | min:4',
            'telefono' => 'required | min:10',
            'direccion' => 'required | min:5'
        ]);

        //dd($data);

        // Subida de la imagen
        // $rutaImagen = $request['Foto']->store('propietarios', 'public');

        // Insersión de datos sin modelo
        // DB::table('registro_personals')->insert([
        //     'nombre' => $data['Nombre'],
        //     'apellido_p' => $data['ApellidoPaterno'],
        //     'apellido_m' => $data['ApellidoMaterno'],
        //     'telefono' => $data['Telefono'],
        //     'direccion' => $data['Direccion'],
        //     //'foto' => $data['Foto'],
        //     'user_id' => Auth::user()->id,
        // ]);

        // Insersión a la BD con modelo
        auth()->user()->datosPersonales()->create([
            'nombre' => $data['nombre'],
            'apellido_p' => $data['apellidoPaterno'],
            'apellido_m' => $data['apellidoMaterno'],
            'telefono' => $data['telefono'],
            'direccion' => $data['direccion'],
            //'foto' => $data['Foto'],
            'user_id' => Auth::user()->id,
        ]);

        return redirect('/main');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegistroPersonal  $registroPersonal
     * @return \Illuminate\Http\Response
     */
    public function show(RegistroPersonal $registroPersonal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegistroPersonal  $registroPersonal
     * @return \Illuminate\Http\Response
     */
    public function edit(RegistroPersonal $registroPersonal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegistroPersonal  $registroPersonal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegistroPersonal $registroPersonal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegistroPersonal  $registroPersonal
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegistroPersonal $registroPersonal)
    {
        //
    }
}
