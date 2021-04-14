{{-- Huerta y Sección --}}
<div class="form-group col-sm-12 col-md-6 mb-5">
    <label for="huerta">Huerta y Sección</label>
    <select name="huerta" id="huerta" class="form-control @error('huerta') is-invalid @enderror">
        <option value="" hidden>Seleccione la huerta y sección</option>
        @foreach ($secciones as $seccion)
            <option 
                value="{{ $seccion->id }}"
                {{ old('huerta') == $seccion->id ? 'selected' : '' }}
            />
            {{ $seccion->propiedad->nombreHuerta .' - '. $seccion->nombreSeccion}}
            </option>
        @endforeach
    </select>
    @error('huerta')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{$message}}</strong>
        </span>
    @enderror
</div>{{-- Fin Huerta y sección --}}