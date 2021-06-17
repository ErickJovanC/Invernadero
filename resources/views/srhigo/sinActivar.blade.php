@extends('layouts.basico')
@section('content')
    <div class="container">
        <div class="titulos col-12">Sr. Higo</div>
        <div class="alert alert-info col-12 text-center">
            Gracias por su registro en Sr. Higo, aun falta que su usuario sea autorizado por el administrador. <br>
            ¡Vuelve pronto!
        </div>
        <a class="btn btn-info align-items-center col-12" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Salir
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
@endsection