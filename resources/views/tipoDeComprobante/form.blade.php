<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="nombre" class="form-control-label">Nombre: </label>
            <input type="text" name="nombre" id="nombre" value="{{$tipoDeComprobante->nombre ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Escriba el nombre del tipo de comprobante</small>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="iva_compras" class="form-control-label">En IVA Compras: </label>
            <input type="checkbox" name="iva_compras" id="iva_compras" value="{{$tipoDeComprobante->iva_compras ?? ''}}" class="form-check" @if((isset($tipoDeComprobante->iva_compras) && $tipoDeComprobante->iva_compras== 1))  checked @else '' @endif>
            <small class="form-text small-text-light">Marque este casillero para que los comprobantes de este tipo figuren en el IVA Compras</small>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="activo" class="form-control-label">Activo: </label>
            <input type="checkbox" name="activo" id="activo" value="{{$tipoDeComprobante->activo ?? ''}}" class="form-check" @if((isset($tipoDeComprobante->activo) && $tipoDeComprobante->activo== 1))  checked @else '' @endif>
            <small class="form-text small-text-light">Desmarque este casillero para que el tipo de comprobante no se pueda usar en el sistema</small>
        </div>
    </div>
</div>


<button class="au-btn au-btn-icon au-btn--blue au-btn--small" type="submit">Guardar</button>

