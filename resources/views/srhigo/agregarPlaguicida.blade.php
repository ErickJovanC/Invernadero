@extends('layouts.app')
@section('content')
<div class="row col">
    <a href="{{ route('main') }}" class="btn btn-success">Menú Principal</a>
</div>
<div class="row my-4">
    <h1 class="titulo mb-5 col-12 text-center">Registro de Plaguicidas</h1>
    
    {{-- Muestra el mensaje de confirmación --}}
    @if(Session::has('mensaje'))
        <div class="alert alert-info col-12 text-center">
            {!! Session::get('mensaje') !!}
        </div>
    @endif

    {{-- Formulario principal --}}
    <form action="{{ route('plaguicida.store') }}" method="post" class="col-12">
    @csrf
        <div class="row">

            {{-- Ingrediente Activo --}}
            <div class="form-group col-12 col-md-6 col-lg-3 mb-5">
                <label for="ingredienteActivo">Ingrediente Activo</label>
                <input type="text" 
                    name="ingredienteActivo" 
                    id="ingredienteActivo" 
                    value="{{ old('ingredienteActivo') }}"
                    class="form-control @error('ingredienteActivo') is-invalid @enderror">
                @error('ingredienteActivo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            {{-- Fin Ingrediente Activo --}}

            {{-- Nombre Comercial --}}
            <div class="form-group col-12 col-md-6 col-lg-3 mb-5">
                <label for="nombreComercial">Nombre Comercial</label>
                <input type="text" 
                    name="nombreComercial" 
                    id="nombreComercial" 
                    value="{{ old('nombreComercial') }}"
                    class="form-control @error('nombreComercial') is-invalid @enderror">
                @error('nombreComercial')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            {{-- Fin Nombre Comercial --}}

            {{-- Tipo de Plaguicida --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-3 mb-5">
                <label for="tipo">Tipo de Plaguicida</label>
                <select name="tipo" id="tipo" class="form-control @error('tipo') is-invalid @enderror">
                    <option value="" hidden>Tipo de Plaguicida</option>
                    <option 
                        value="Herbicida"
                        {{ old('tipo') == 'Herbicida' ? 'selected' : '' }}
                    />
                        Herbicida
                    </option>
                    <option 
                        value="Fungicida"
                        {{ old('tipo') == 'Fungicida' ? 'selected' : '' }}
                    />
                        Fungicida
                    </option>
                    <option 
                        value="Pesticida"
                        {{ old('tipo') == 'Pesticida' ? 'selected' : '' }}
                    />
                        Pesticida
                    </option>
                </select>
                @error('tipo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Tipo de Plaguicida --}}

            {{-- Color de la Banda --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-3 mb-5">
                <label for="colorBanda">Color de la Banda</label>
                <select name="colorBanda" id="colorBanda" class="form-control @error('colorBanda') is-invalid @enderror">
                    <option value="" hidden>Color de la banda</option>
                    <option 
                        value="Verde"
                        {{ old('colorBanda') == 'Verde' ? 'selected' : '' }}
                    />
                        Verde
                    </option>
                    <option 
                        value="Azul"
                        {{ old('colorBanda') == 'Azul' ? 'selected' : '' }}
                    />
                        Azul
                    </option>
                    <option 
                        value="Amarillo"
                        {{ old('colorBanda') == 'Amarillo' ? 'selected' : '' }}
                    />
                        Amarillo
                    </option>
                    <option 
                        value="Rojo"
                        {{ old('colorBanda') == 'Rojo' ? 'selected' : '' }}
                    />
                        Rojo
                    </option>
                </select>
                @error('colorBanda')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Color de la Banda --}}

        </div>

        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Plaguicida" class="btn btn-primary px-5">
            </div>
        </div>
    </form>
</div>

{{-- Tabla de registros --}}
<div class="row">
    <div class="col">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Ingredinete Activo</th>
                    <th scope="col">Nombre Comercial</th>
                    <th scope="col">Tipo de Plaguicida</th>
                    <th scope="col">Color de la Banda</th>
                </tr>
            </thead>
            <tbody>
                @foreach($plaguicidas as $plaguicida)
                <tr>
                    <th scope="row">{{ $plaguicida->ingredienteActivo }}</th>
                    <td>{{ $plaguicida->nombreComercial }}</td>
                    <td>{{ $plaguicida->tipo }}</td>
                    <td>{{ $plaguicida->colorBanda }}</td>
                    {{-- <td><a href="{{ route('plaguicida.edit', $plaguicida) }}" class="btn btn-warning">Editar</a> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <a href="{{ route('main') }}" class="btn btn-success ">Menú Principal</a>
    <a href="{{ route('aplicacionPlaguicida.create') }}" class="btn btn-danger ml-3">Registrar Aplicación de Plaguicida</a>
</div>
{{-- Fin tabla de contenido --}}
@endsection