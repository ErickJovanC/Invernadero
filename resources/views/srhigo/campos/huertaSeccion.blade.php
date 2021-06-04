{{-- Huerta y Sección --}}
<div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
    <label for="huertaSeccion">Huerta y Sección</label>
    <select name="huertaSeccion" id="huertaSeccion" class="form-control @error('huertaSeccion') is-invalid @enderror">
        <option value="" hidden>Seleccione la huerta y sección</option>
        @foreach ($secciones as $seccion)
            <option 
                value="{{ $seccion->id }}"
                {{ old('huertaSeccion') == $seccion->id ? 'selected' : '' }}
            />
            {{ $seccion->propiedad->nombreHuerta .' - '. $seccion->nombreSeccion}}
            </option>
        @endforeach
    </select>
    @error('huertaSeccion')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{$message}}</strong>
        </span>
    @enderror
</div>{{-- Fin Huerta y sección --}}