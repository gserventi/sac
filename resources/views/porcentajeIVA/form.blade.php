<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="nombre" class="form-control-label">Porcentaje: </label>
            <input type="text" name="nombre" id="nombre" value="{{$porcentajeIVA->porcentaje ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Escriba el valor del porcentaje de IVA (sin el signo %)</small>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="activo" class="form-control-label">Activo: </label>
            <input type="checkbox" name="activo" id="activo" value="{{$porcentajeIVA->activo ?? ''}}" class="form-check" @if((isset($porcentajeIVA->activo) && $porcentajeIVA->activo== 1))  checked @else '' @endif>
            <small class="form-text small-text-light">Desmarque este casillero para que el porcentaje no se pueda usar en el sistema</small>
        </div>
    </div>
</div>

<button class="au-btn au-btn-icon au-btn--blue au-btn--small" type="submit">Guardar</button>

