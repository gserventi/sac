@if(count($errors) > 0 )
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul class="p-0 m-0" style="list-style: none;">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="nombre" class="form-control-label">Nombre: </label>
            <input type="text" name="nombre" id="nombre" value="{{$proveedor->nombre ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Escriba el nombre del proveedor</small>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="cuit" class="form-control-label">CUIT: </label>
            <input type="text" name="cuit" id="cuit" value="{{$proveedor->cuit ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Escriba el numero de CUIT sin guiones</small>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="id_rubro" class="form-control-label">Rubro: </label>
            <select name="id_rubro" id="select" class="form-control">
                <option selected value="{{$proveedor->rubro->id ?? ''}}">{{$proveedor->rubro->nombre ?? ''}}</option>
                @foreach($rubros as $rubro)
                    <option value="{{$rubro->id ?? ''}}">{{$rubro->nombre ?? ''}}</option>
                @endforeach
            </select>
            <small class="form-text small-text-light">Seleccione el rubro al que pertenece este proveedor</small>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="email" class="form-control-label">Email: </label>
            <input type="text" name="email" id="email" value="{{$proveedor->email ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Escriba la direccion de email</small>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="telefono" class="form-control-label">Telefono: </label>
            <input type="text" name="telefono" id="telefono" value="{{$proveedor->telefono ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Escriba el numero de telefono</small>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="dias_pago" class="form-control-label">Dias de Pago: </label>
            <input type="text" name="dias_pago" id="dias_pago" value="{{$proveedor->dias_pago ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Escriba la cantidad de dias de pago</small>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="id_porcentaje_iva" class="form-control-label">Porcentaje de IVA: </label>
            <select name="id_porcentaje_iva" id="select" class="form-control">
                <option selected value="{{$proveedor->porcentajeIVA->id ?? ''}}">{{$proveedor->porcentajeIVA->porcentaje ?? ''}}</option>
                @foreach($porcentajes_iva as $porcentaje_iva)
                    <option value="{{$porcentaje_iva->id ?? ''}}">{{$porcentaje_iva->porcentaje . '%' ?? ''}} </option>
                @endforeach
            </select>
            <small class="form-text small-text-light">Seleccione el porcentaje de IVA que aplica a este proveedor</small>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="id_forma_de_pago_default" class="form-control-label">Forma de Pago: </label>
            <select name="id_forma_de_pago_default" id="select" class="form-control">
                <option selected value="{{$proveedor->formaDePago->id ?? ''}}">{{$proveedor->formaDePago->nombre ?? ''}}</option>
                @foreach($formas_de_pago as $forma_de_pago)
                    <option value="{{$forma_de_pago->id ?? ''}}">{{$forma_de_pago->nombre ?? ''}} </option>
                @endforeach
            </select>
            <small class="form-text small-text-light">Seleccione la forma de pago que mas utiliza este proveedor</small>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="id_tipo_comprobante" class="form-control-label">Tipo de Comprobante: </label>
            <select name="id_tipo_comprobante" id="select" class="form-control">
                <option selected value="{{$proveedor->tipoDeComprobante->id ?? ''}}">{{$proveedor->tipoDeComprobante->nombre ?? ''}}</option>
                @foreach($tipos_de_comprobantes as $tipo_de_comprobante)
                    <option value="{{$tipo_de_comprobante->id ?? ''}}">{{$tipo_de_comprobante->nombre ?? ''}} </option>
                @endforeach
            </select>
            <small class="form-text small-text-light">Seleccione el tipo de comprobante que utiliza este proveedor</small>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="observaciones" class="form-control-label">Observaciones: </label>
            <textarea name="observaciones" id="observaciones" rows="5" class="form-control">{{$proveedor->observaciones ?? ''}}</textarea>
            <small class="form-text small-text-light">Escriba alguna observacion para este proveedor</small>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="activo" class="form-control-label">Activo: </label>
            <input type="checkbox" name="activo" id="activo" value="{{$proveedor->activo ?? ''}}" class="form-check" @if((isset($proveedor->activo) && $proveedor->activo== 1))  checked @else '' @endif>
            <small class="form-text small-text-light">Desmarque este casillero para que el proveedor no se pueda usar en el sistema</small>
        </div>
    </div>
</div>

<button class="au-btn au-btn-icon au-btn--blue au-btn--small" type="submit">Guardar</button>

