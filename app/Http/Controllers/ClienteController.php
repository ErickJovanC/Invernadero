<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
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
        $clientes = Auth::user()->clientes;
        return view('srhigo.cliente')->
        with([
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
        // dd('Clientes');
        $data = $request->validate([
            'nombre' => 'required',
            'destino' => 'required',
        ]);

        Auth::user()->clientes()->create([
            'nombre' => $data['nombre'],
            'apellido' => $request['apellido'],
            'empresa' => $request['empresa'],
            'destino' => $data['destino'],
        ]);

        return redirect('cliente/create')->with([
            'mensaje' => '¡El cliente se ha registrado correctamente!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('srhigo.clienteEdit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'destino' => 'required',
        ]);

        $cliente->update([
            'nombre' => $data['nombre'],
            'apellido' => $request['apellido'],
            'empresa' => $request['empresa'],
            'destino' => $data['destino'],
        ]);

        $clientes = Auth::user()->clientes;
        return redirect('cliente/create')->
        with([
                'clientes' => $clientes,
                'mensaje' => '¡El cliente se a actualizado correctamente!'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
