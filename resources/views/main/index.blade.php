@extends('layouts.app')
@section('content')
    <a href="{{ route('registroPersonal.index') }}" class="btn btn-success">Registro Personal</a>
    <a href="{{ route('registroPropiedad.index') }}" class="btn btn-success">Registro Propiedad</a>
@endsection