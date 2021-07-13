@extends('layouts.app')
@section('content')
<div class="row">
    <a href="{{ route('main') }}" class="btn btn-success">Menú Principal</a>
</div>
<div class="row my-4">
    <h1 class="titulo mb-5 col-12 text-center">Registro de Huertas</h1>

    {{-- Muestra el mensaje de confirmación --}}
    @if(Session::has('mensaje'))
        <div class="alert alert-info col-12 text-center">
            {!! Session::get('mensaje') !!}
        </div>
    @endif

    {{-- Formulario principal --}}
    <form action="{{ route('registroPropiedad.store') }}" method="post" class="col-12">
        @csrf
        <div class="row mb-4 align-items-end">
            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="nombreHuerta">Nombre de la Huerta</label>
                <input type="text" 
                    name="nombreHuerta" 
                    id="nombreHuerta"
                    class="form-control @error('nombreHuerta') is-invalid @enderror"
                    value="{{ old('nombreHuerta') }}"
                >
                @error('nombreHuerta')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="codigoRegistro">Código de registro (Senasica)</label>
                <input type="text" 
                    name="codigoRegistro" 
                    id="codigoRegistro" 
                    class="form-control @error('codigoRegistro') is-invalid @enderror"
                    value="{{ old('codigoRegistro') }}"
                >
                @error('codigoRegistro')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="estado">Estado</label>
                <select name="estado"
                    id="estado" 
                    class="form-control @error('estado') is-invalid @enderror"
                >
                    {{-- <option value="" hidden>Seleccione el estado</option> --}}
                    @foreach($estados as $estado)
                        <option value="{{ $estado->id }}"
                            {{ old('estado') == $estado->id ? 'selected' : '' }}
                            >{{ $estado->estado }}</option>
                    @endforeach
                </select>
                @error('estado')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6 col-lg-3 mb-5">
                <label for="municipio">Municipio</label>
                <select name="municipio" id="municipio" 
                    class="form-control @error('municipio') is-invalid @enderror"
                >
                    <option value="" hidden>Seleccione el municipio</option>
                    @foreach($municipios as $municipio)
                        <option value="{{ $municipio->id }}" 
                            {{ old('municipio') == $municipio->id ? 'selected' : '' }}
                            >{{ $municipio->municipio }}</option>
                    @endforeach
                </select>
                @error('municipio')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6 col-lg-3 mb-5">
                <label for="colonia">Colonia</label>
                <input type="text" name="colonia" id="colonia" 
                    class="form-control @error('colonia') is-invalid @enderror"
                    value="{{ old('colonia') }}"
                >
                @error('colonia')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6 col-lg-3 mb-5">
                <label for="calle">Calle y Número</label>
                <input type="text" name="calle" id="calle" 
                    class="form-control @error('calle') is-invalid @enderror"
                    value="{{ old('calle') }}"
                >
                @error('calle')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6 col-lg-3 mb-5">
                <label for="comunidad">Comunidad, Predio y/o Campo</label>
                <input type="text" name="comunidad" id="comunidad" 
                    class="form-control @error('comunidad') is-invalid @enderror"
                    value="{{ old('comunidad') }}"
                >
                @error('comunidad')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            {{-- <div class="form-group col-12">
                <label for="ubicacion">Ubicación</label>
                <input type="text" name="ubicacion" class="form-control">
            </div> --}}

            {{-- Mapa Google --}}
            {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d967288.4768919495!2d-99.6242015024996!3d18.73250458004401!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cddfae25f6fe47%3A0x975f8225a169dd0f!2sMorelos!5e0!3m2!1ses-419!2smx!4v1621463833508!5m2!1ses-419!2smx" height="400" style="border:0;" allowfullscreen="" loading="lazy" class="col-12"></iframe> --}}
            {{-- Fin Mapa Google --}}

        </div>
        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Huerta" class="btn btn-primary px-5">
            </div>
        </div>
    </form>
</div>

{{-- Tabla de Huertas --}}
<div class="row justify-content-center my-3">
    <div class="col-12 justify-content-center">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Municipio</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($huertas as $huerta)
                <tr>
                    <th scope="row">{{ $huerta->id }}</th>
                    <td>{{ $huerta->nombreHuerta }}</td>
                    <td>{{ $huerta->estado->estado }}</td>
                    <td>{{ $huerta->municipio->municipio }}</td>
                    {{-- <td><a href="{{ url() }}"></a></td> --}}
                    <td><a href="{{ route('registroPropiedad.edit', $huerta) }}"><button class="btn btn-warning">Editar</button></a>
                    {{-- <td><a href="{{ url('registroPropiedad/'. $huerta->id .'/edit') }}"><button class="btn btn-warning">Editar</button></a> --}}
                    {{-- <td><button class="btn btn-warning" data-toggle="modal" data-target="#huerta{{ $huerta->id }}">Editar</button> --}}
                        {{-- Modal --}}
                        <div class="modal fade" id="huerta{{ $huerta->id }}" tabindex="-1" role="dialog" aria-labelledby="Titulo" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title h1" id="Titulo">Editar Registro</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/registroPropiedad/'.$huerta->id) }}" method="post">
                                            @csrf
                                            @method('patch')
                                            <div class="row mb-4 align-items-end">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                                                    <label for="nombreHuerta">Nombre de la Huerta</label>
                                                    <input type="text" 
                                                        name="nombreHuerta" 
                                                        id="nombreHuerta"
                                                        class="form-control @error('nombreHuerta') is-invalid @enderror"
                                                        value="{{ $huerta->nombreHuerta }}"
                                                    >
                                                    @error('nombreHuerta')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                                                    <label for="codigoRegistro">Código de registro (Senasica)</label>
                                                    <input type="text" 
                                                        name="codigoRegistro" 
                                                        id="codigoRegistro" 
                                                        class="form-control"
                                                        value="{{ $huerta->codigoRegistro }}"
                                                    >
                                                </div>

                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                                                    <label for="estado">Estado</label>
                                                    <select name="estado"
                                                        id="estado" 
                                                        class="form-control @error('estado') is-invalid @enderror"
                                                    >
                                                        {{-- <option value="" hidden>Seleccione el estado</option> --}}
                                                        @foreach($estados as $estado)
                                                            <option 
                                                                value="{{ $estado->id }}"
                                                                {{ $huerta->estado_id == $estado->id ? 'selected' : '' }}
                                                            >{{ $estado->estado }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('estado')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                                                    <label for="municipio">Municipio</label>
                                                    <select name="municipio" id="municipio" 
                                                        class="form-control @error('municipio') is-invalid @enderror"
                                                    >
                                                        <option value="" hidden>Seleccione el municipio</option>
                                                        @foreach($municipios as $municipio)
                                                            <option value="{{ $municipio->id }}"
                                                                {{ $huerta->municipio_id == $municipio->id ? 'selected' : '' }}
                                                                >{{ $municipio->municipio }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('municipio')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                                                    <label for="colonia">Colonia</label>
                                                    <input type="text" name="colonia" id="colonia" 
                                                        class="form-control @error('colonia') is-invalid @enderror"
                                                        value="{{ $huerta->colonia }}"
                                                    >
                                                    @error('colonia')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                                                    <label for="calle">Calle y Número</label>
                                                    <input type="text" name="calle" id="calle" 
                                                        class="form-control @error('calle') is-invalid @enderror"
                                                        value="{{ $huerta->calle }}"
                                                    >
                                                    @error('calle')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                                                    <label for="comunidad">Comunidad, Predio y/o Campo</label>
                                                    <input type="text" name="comunidad" id="comunidad" 
                                                        class="form-control @error('comunidad') is-invalid @enderror"
                                                        value="{{ $huerta->comunidad }}"
                                                    >
                                                    @error('comunidad')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <input type="submit" value="Editar Registro" class="btn btn-warning px-5">
                                                {{-- <button type="button" class="btn btn-danger">Editar Registro</button> --}}
                                            </div>

                                            <div class="row justify-content-end">
                                                <div class="form-group">
                                                    
                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        {{-- Fin modal --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- fin Tabla de Huertas --}}

<div class="row">
    <a href="{{ route('main') }}" class="btn btn-success">Menú Principal</a>
</div>
@endsection