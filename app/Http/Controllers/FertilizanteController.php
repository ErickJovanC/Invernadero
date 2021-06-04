<?php

namespace App\Http\Controllers;

use App\Models\Fertilizante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FertilizanteController extends Controller
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
        // dd('hello');
        return view('srhigo.agregarFertilizante');
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
            'nombreFertilizante' => 'required',
            'N' => 'required',
            'P2O5' => 'required',
            'K2O' => 'required',
            'Ca' => 'required',
            'Mg' => 'required',
            'S' => 'required',
            'micronutrientes' => 'required',
        ]);

        Auth::user()->registroFertilizante()->create([
            'nombreFertilizante' => $data['nombreFertilizante'],
            'N' => $data['N'],
            'P2O5' => $data['P2O5'],
            'K2O' => $data['K2O'],
            'Ca' => $data['Ca'],
            'Mg' => $data['Mg'],
            'S' => $data['S'],
            'micronutrientes' => $data['micronutrientes'],
        ]);

        return redirect(route('main'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fertilizante  $fertilizante
     * @return \Illuminate\Http\Response
     */
    public function show(Fertilizante $fertilizante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fertilizante  $fertilizante
     * @return \Illuminate\Http\Response
     */
    public function edit(Fertilizante $fertilizante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fertilizante  $fertilizante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fertilizante $fertilizante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fertilizante  $fertilizante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fertilizante $fertilizante)
    {
        //
    }
}
