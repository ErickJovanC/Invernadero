@extends('layouts.app')
@section('content')
    <a href="{{ route('registroPersonal.index') }}" class="btn btn-success">Registro Personal</a>
    <a href="{{ route('registroPropiedad.index') }}" class="btn btn-success">Registro Propiedad</a>
    <a href="preparacionSuelo/" class="btn btn-success">Preparación del suelo</a>
@endsection