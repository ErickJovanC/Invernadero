@extends('layouts.app')
@section('content')
    <div class="row">

        {{-- Muestra el mensaje de confirmación --}}
        @if(Session::has('mensaje'))
            <div class="alert alert-info col-12 text-center">
                {!! Session::get('mensaje') !!}
            </div>
        @endif

        <h1 class="col-12">Registros del Productor</h1>
        <a href="{{ route('registroPropiedad.create') }}"
            class="btn btn-success btn-menu col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
            Huertas Registradas
        </a>

        <a href="{{ route('seccion.create') }}"
            class="btn btn-success btn-menu col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
            Secciones Registradas
        </a>

        <a href="{{ route('empleado.create') }}"
            class="btn btn-success btn-menu col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
            Empleados Registrados
        </a>

        <a href="{{ route('cliente.create') }}"
            class="btn btn-success btn-menu col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
            Destinatarios Registrados
        </a>

        <h1 class="col-12 mt-5">Preparación, Siembra y Cosecha</h1>
        <a href="{{ route('calidadPlanta.create') }}"
            class="btn btn-primary btn-menu col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
            Recepción de Plantas
        </a>

        <a href="{{ route('preparacionSuelo.create') }}"
            class="btn btn-primary btn-menu col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
            Preparación de suelo
        </a>

        <a href="{{ route('registroSiembra.create') }}"
            class="btn btn-primary btn-menu col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
            Registro de Siembra
        </a>

        <a href="{{ route('cosecha.create') }}"
            class="btn btn-primary btn-menu col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
            Registro de Cosecha
        </a>

        <h1 class="col-12 mt-5">Fertilización y Riego</h1>
        <a href="{{ route('fertilizante.create') }}"
            class="btn btn-warning btn-menu col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
            Agregar Fertilizante
        </a>

        <a href="{{ route('aplicacionFertilizante.create') }}"
            class="btn btn-warning btn-menu col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
            Aplicación de Fertilizante Quimico
        </a>

        <a href="{{ route('aplicacionFertilizanteOrganico.create') }}"
            class="btn btn-warning btn-menu col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
            Aplicación de Fertilizante Organico
        </a>

        <a href="{{ route('registroRiego.create') }}"
            class="btn btn-warning btn-menu col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
            Registro de Riego
        </a>

        <h1 class="col-12 mt-5">Plagas y Enfermedades</h1>

        <a href="{{ route('controlPreventivo.create') }}"
            class="btn btn-danger btn-menu col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 p-2">
            Control preventivo de plagas en la planta (Previo a plantar)
        </a>

        <a href="{{ route('plagas.create') }}"
            class="btn btn-danger btn-menu col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 p-2">
            Control Preventivo de Plagas en plantas y arboles
        </a>

        <a href="{{ route('identificacionPlagas.create') }}"
            class="btn btn-danger btn-menu col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 p-2">
            Identificacion de Plagas
        </a>

        <a href="{{ route('plaguicida.create') }}"
            class="btn btn-danger btn-menu col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 p-2">
            Agregar Plaguicida
        </a>

        <a href="{{ route('aplicacionPlaguicida.create') }}"
            class="btn btn-danger btn-menu col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 p-2">
            Aplicación de Plaguicida
        </a>

        <h1 class="col-12 mt-5">Mantenimiento y Capacitación</h1>

        <a href="{{ route('calibracionEquipo.create') }}"
            class="btn btn-secondary btn-menu col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
            Calibración de Equipo de Aplicación
        </a>

        <a href="{{ route('limpiezaCanales.create') }}"
            class="btn btn-secondary btn-menu col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
            Limpieza de canales
        </a>

        <a href="{{ route('cortePlanta.create') }}"
            class="btn btn-secondary btn-menu col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
            Corte de Plantas y Arboles
        </a>

        <a href="{{ route('capacitacionPersonal.create') }}"
            class="btn btn-secondary btn-menu col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
            Capacitación del Personal
        </a>

        <h1 class="col-12 mt-5">Administración y Finanzas</h1>

        <a href="{{ route('gasto.create') }}"
            class="btn btn-info btn-menu col-12 col-md-6 p-2">
            Regitro de Gastos
        </a>

        <a href="{{ route('finanzas.index') }}"
            class="btn btn-info btn-menu col-12 col-md-6 p-2">
            Reporte Financiero
        </a>

        <h1 class="col-12 mt-5">Registro de Actividades</h1>
        <a href="{{ route('historial.index') }}"
            class="btn btn-info btn-menu col-12  p-2">
            Historial de Actividades
        </a>

    </div>
@endsection