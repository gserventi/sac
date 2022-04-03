<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="nombre" class="form-control-label">Nombre: </label>
            <input type="text" name="nombre" id="nombre" value="{{$rubro->nombre ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Escriba el nombre del rubro</small>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="activo" class="form-control-label">Activo: </label>
            <input type="checkbox" name="activo" id="activo" value="{{$rubro->activo ?? ''}}" class="form-check" @if((isset($rubro->activo) && $rubro->activo== 1))  checked @else '' @endif>
            <small class="form-text small-text-light">Desmarque este casillero para que el rubro no se pueda usar en el sistema</small>
        </div>
    </div>
</div>

<button class="au-btn au-btn-icon au-btn--blue au-btn--small" type="submit">Guardar</button>
