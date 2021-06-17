<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Realizar la consulta del usuario aquí.
        // O colocar un boton en la vista para el administrador, enviando un mensaje y de ahi mostrar cierto contenido
        // Podria haber mas de un contenido de acuerdo a lo que desee mostrar
        return view('main.index');
    }
}
