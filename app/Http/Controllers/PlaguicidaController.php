<?php

namespace App\Http\Controllers;

use App\Models\Plaguicida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaguicidaController extends Controller
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
        $plaguicidas = Auth::user()->plaguicida;
        return view('srhigo.agregarPlaguicida', compact('plaguicidas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'ingredienteActivo' => 'required',
            'nombreComercial' => 'required | unique:plaguicidas',
            'tipo' => 'required',
            'colorBanda' => 'required',
        ]);

        Auth::user()->plaguicida()->create([
            'ingredienteActivo' => $data['ingredienteActivo'],
            'nombreComercial' => $data['nombreComercial'],
            'tipo' => $data['tipo'],
            'colorBanda' => $data['colorBanda'],
        ]);

        return redirect('main')->with('mensaje', 'Se agrego correctamente el Plaguicida');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plaguicida  $plaguicida
     * @return \Illuminate\Http\Response
     */
    public function show(Plaguicida $plaguicida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plaguicida  $plaguicida
     * @return \Illuminate\Http\Response
     */
    public function edit(Plaguicida $plaguicida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plaguicida  $plaguicida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plaguicida $plaguicida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plaguicida  $plaguicida
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plaguicida $plaguicida)
    {
        //
    }
}
