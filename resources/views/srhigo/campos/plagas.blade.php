{{-- Plagas --}}
<div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
    <label for="plaga">Plaga</label>
    <select name="plaga" id="plaga" class="form-control @error('plaga') is-invalid @enderror">
        <option value="" hidden>¿Cúal es la Plaga Identificada?</option>
        @foreach ($plagas as $plaga)
            <option 
                value="{{ $plaga->id }}" 
                {{ old('plaga') == $plaga->id ? 'selected' : '' }}
            >
                {{ $plaga->nombrePlaga }}
            </option>
        @endforeach
    </select>
    @error('plaga')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{$message}}</strong>
        </span>
    @enderror
</div> {{-- Fin Plagas --}}