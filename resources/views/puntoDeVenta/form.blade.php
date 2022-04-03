<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="nombre" class="form-control-label">Nombre: </label>
            <input type="text" name="nombre" id="nombre" value="{{$puntoDeVenta->nombre ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Escriba el nombre del punto de venta</small>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="prefijo" class="form-control-label">Prefijo: </label>
            <input type="text" name="prefijo" id="prefijo" value="{{$puntoDeVenta->prefijo ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Escriba el prefijo del punto de venta</small>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="ultimo_numero" class="form-control-label">Ultimo Numero: </label>
            <input type="text" name="ultimo_numero" id="ultimo_numero" value="{{$puntoDeVenta->ultimo_numero ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Escriba el ultimo numero utilizado de este prefijo (si es nuevo, ingrese 0)</small>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="activo" class="form-control-label">Activo: </label>
            <input type="checkbox" name="activo" id="activo" value="{{$puntoDeVenta->activo ?? ''}}" class="form-check" @if((isset($puntoDeVenta->activo) && $puntoDeVenta->activo== 1))  checked @else '' @endif>
            <small class="form-text small-text-light">Desmarque este casillero para que el rubro no se pueda usar en el sistema</small>
        </div>
    </div>
</div>

<button class="au-btn au-btn-icon au-btn--blue au-btn--small" type="submit">Guardar</button>

