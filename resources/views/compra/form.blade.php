<div class="row">
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="id_periodo" class="form-control-label">Periodo: </label>
            <select name="id_periodo" id="select" class="form-control">
                <option selected value="{{$compra->periodo->id ?? ''}}">{{$compra->periodo->nombre ?? ''}}</option>
                @foreach($periodos as $periodo)
                    <option value="{{$periodo->id ?? ''}}">{{$periodo->nombre ?? ''}}</option>
                @endforeach
            </select>
            <small class="form-text small-text-light">Seleccione el periodo para esta compra</small>
        </div>
    </div>
    <div class="col-12 col-md-8">
        <div class="form-group">
            <label for="id_proveedor" class="form-control-label">Proveedor: </label>
            <select name="id_proveedor" id="select" class="form-control">
                <option selected value="{{$compra->proveedor->id ?? ''}}">{{$compra->proveedor->nombre ?? ''}}</option>
                @foreach($proveedores as $proveedor)
                    <option value="{{$proveedor->id ?? ''}}">{{$proveedor->nombre ?? ''}}</option>
                @endforeach
            </select>
            <small class="form-text small-text-light">Seleccione el proveedor para esta compra</small>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="fecha_comprobante" class="form-control-label">Fecha de Comprobante: </label>
            <input type="date" name="fecha_comprobante" id="fecha_comprobante" value="{{$compra->fecha_comprobante ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Ingrese la fecha del comprobante</small>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="id_tipo_comprobante" class="form-control-label">Tipo de Comprobante: </label>
            <select name="id_tipo_comprobante" id="select" class="form-control">
                <option selected value="{{$compra->tipoDeComprobante->id ?? ''}}">{{$compra->tipoDeComprobante->nombre ?? ''}}</option>
                @foreach($tipos_de_comprobantes as $tipoDeComprobante)
                    <option value="{{$tipoDeComprobante->id ?? ''}}">{{$tipoDeComprobante->nombre ?? ''}}</option>
                @endforeach
            </select>
            <small class="form-text small-text-light">Seleccione el tipo de comprobante para esta compra</small>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="numero_comprobante" class="form-control-label">Numero de Comprobante: </label>
            <input type="text" name="numero_comprobante" id="numero_comprobante" value="{{$compra->numero_comprobante ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Ingrese el numero del comprobante</small>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="exento" class="form-control-label">Exento: </label>
{{--            <input type="text" name="exento" id="exento" value="@if(isset($compra->exento)) @if($compra->exento > 0) ${{$compra->exento}} @endif @endif" class="form-control">--}}
            <input type="text" name="exento" id="exento" value="{{$compra->exento ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Ingrese el valor Exento, si corresponde. De lo contrario, puede dejar vacio este campo</small>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="no_gravado" class="form-control-label">No Gravado: </label>
            <input type="text" name="no_gravado" id="no_gravado" value="{{$compra->no_gravado ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Ingrese el valor No Gravado, si corresponde. De lo contrario, puede dejar vacio este campo</small>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="gravado" class="form-control-label">Gravado: </label>
            <input type="text" name="gravado" id="gravado" value="{{$compra->gravado ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Ingrese el valor Gravado, si corresponde. De lo contrario, puede dejar vacio este campo</small>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="iva_21" class="form-control-label">IVA 21%: </label>
            <input type="text" name="iva_21" id="iva_21" value="{{$compra->iva_21 ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Ingrese el valor IVA 21%, si corresponde. De lo contrario, puede dejar vacio este campo</small>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="iva_27" class="form-control-label">IVA 27%: </label>
            <input type="text" name="iva_27" id="iva_27" value="{{$compra->iva_27 ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Ingrese el valor IVA 27%, si corresponde. De lo contrario, puede dejar vacio este campo</small>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="iva_105" class="form-control-label">IVA 10.5%: </label>
            <input type="text" name="iva_105" id="iva_105" value="{{$compra->iva_105 ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Ingrese el valor IVA 10.5%, si corresponde. De lo contrario, puede dejar vacio este campo</small>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="percepcion_iva_RG3337_3" class="form-control-label">Percep.IVA RG 3337 3%: </label>
            <input type="text" name="percepcion_iva_RG3337_3" id="percepcion_iva_RG3337_3" value="{{$compra->percepcion_iva_RG3337_3 ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Ingrese el valor de Percep.IVA RG 3337 3%, si corresponde. De lo contrario, puede dejar vacio este campo</small>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="percepcion_iva_RG3337_105" class="form-control-label">Percep.IVA RG 3337 10.5%: </label>
            <input type="text" name="percepcion_iva_RG3337_105" id="percepcion_iva_RG3337_105" value="{{$compra->percepcion_iva_RG3337_105 ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Ingrese el valor de Percep.IVA RG 3337 10.5%, si corresponde. De lo contrario, puede dejar vacio este campo</small>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="percepcion_iibb_caba_15" class="form-control-label">Percep.IIBB CABA 1.5%: </label>
            <input type="text" name="percepcion_iibb_caba_15" id="percepcion_iibb_caba_15" value="{{$compra->percepcion_iibb_caba_15 ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Ingrese el valor de Percep.IIBB CABA 1.5%, si corresponde. De lo contrario, puede dejar vacio este campo</small>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="percepcion_iibb_ba_01" class="form-control-label">Percep.IIBB BA 0.1%: </label>
            <input type="text" name="percepcion_iibb_ba_01" id="percepcion_iibb_ba_01" value="{{$compra->percepcion_iibb_ba_01 ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Ingrese el valor de Percep.IIBB BA 0.1%, si corresponde. De lo contrario, puede dejar vacio este campo</small>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="neto" class="form-control-label">Neto: </label>
            <input type="text" name="neto" id="neto" value="{{$compra->neto ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Ingrese el valor del neto</small>
        </div>
    </div>

</div>

<button class="au-btn au-btn-icon au-btn--blue au-btn--small" type="submit">Guardar</button>
