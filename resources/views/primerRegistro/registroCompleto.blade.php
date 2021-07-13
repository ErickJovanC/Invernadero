@extends('layouts.basico')
@section('content')
<div class="row justify-content-center align-items-center">
    <div class="col-12 titulos alert alert-success text-center mt-5">
        !Gracias!<br>
        Su registro esta completo
    </div>
    <div class="col-12 text-center mt-5">Ahora su usuario debe ser autorizado por el administrador, vuelva en otro momento o verifique la autorización</div>
    <div class="col-3 text-center">
        @php
            $mensaje = '¡Felicidades!<br>Su usuario fue autorizado y ahora puede realizar sus registros!'    
        @endphp
        <a href="{{ route('main') }}" class="btn btn-success my-5 px-5">Verificar Autorización</a>
    </div>
    {{-- <div class="col-3 text-center">
        <a href="{{ redirect('main') }}" class="btn btn-danger my-5">Cerrar Sesión</a>
    </div> --}}
    <div class="col-3 text-center">
        <a class="btn btn-danger my-5 px-5" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>
@endsection