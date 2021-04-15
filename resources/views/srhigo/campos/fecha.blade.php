{{-- Fecha --}}
<div class="form-group col-sm-12 col-md-6 mb-5">
    <label for="fecha">Fecha de Aplicación</label>
    <input type="date" 
        name="fecha" 
        id="fecha"
        max="{{ $fechaActual }}"
        value="{{ old('fecha') }}"
        class="form-control 
            @error('fecha') is-invalid @enderror" 
    />
    @error('fecha')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{$message}}</strong>
        </span>
    @enderror
</div>{{-- Fin Fecha --}}