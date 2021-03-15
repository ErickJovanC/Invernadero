<?php

namespace App\Http\Controllers;

use App\Models\RegistroPersonal;
use Illuminate\Http\Request;

class RegistroPersonalController extends Controller
{
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
        $data = request()->validate([
            'Nombre' => 'required | min:3',
            'ApellidoPaterno' => 'required | min:4',
            'ApellidoMaterno' => 'required | min:4',
            'Telefono' => 'required | min:10',
            'Direccion' => 'required | min 5'
            
        ]);
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
