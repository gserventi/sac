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
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="id_periodo" class="form-control-label">Periodo: </label>
            <select name="id_periodo" id="select" class="form-control">
                <option selected value="{{$venta->periodo->id ?? ''}}">{{$venta->periodo->nombre ?? ''}}</option>
                @foreach($periodos as $periodo)
                    <option value="{{$periodo->id ?? ''}}">{{$periodo->nombre ?? ''}}</option>
                @endforeach
            </select>
            <small class="form-text small-text-light">Seleccione el periodo para esta venta</small>
        </div>
    </div>
    <div class="col-12 col-md-8">
        <div class="form-group">
            <label for="id_cliente" class="form-control-label">Cliente: </label>
            <select name="id_cliente" id="select" class="form-control">
                <option selected value="{{$venta->cliente->id ?? ''}}">{{$venta->cliente->nombre ?? ''}}</option>
                @foreach($clientes as $cliente)
                    <option value="{{$cliente->id ?? ''}}">{{$cliente->nombre ?? ''}}</option>
                @endforeach
            </select>
            <small class="form-text small-text-light">Seleccione el cliente para esta venta</small>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="fecha_comprobante" class="form-control-label">Fecha de Comprobante: </label>
            <input type="date" name="fecha_comprobante" id="fecha_comprobante" value="{{$venta->fecha_comprobante ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Ingrese la fecha del comprobante</small>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="id_punto_de_venta" class="form-control-label">Punto de Venta: </label>
            <select name="id_punto_de_venta" id="select" class="form-control">
                <option selected value="{{$venta->puntoDeVenta->id ?? ''}}">{{$venta->puntoDeVenta->nombre ?? ''}} {{$venta->puntoDeVenta->prefijo ?? ''}}</option>
                @foreach($puntos_de_venta as $puntoDeVenta)
                    <option value="{{$puntoDeVenta->id ?? ''}}">{{$puntoDeVenta->nombre ?? ''}} {{$puntoDeVenta->prefijo ?? ''}}</option>
                @endforeach
            </select>
            <small class="form-text small-text-light">Seleccione el punto de venta para esta venta</small>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="numero_comprobante" class="form-control-label">Numero de Comprobante: </label>
            <input type="text" name="numero_comprobante" id="numero_comprobante" value="{{$venta->numero_comprobante ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Ingrese el numero del comprobante</small>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="no_gravado" class="form-control-label">No Gravado: </label>
            <input type="text" name="no_gravado" id="no_gravado" value="{{$venta->no_gravado ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Ingrese el valor No Gravado, si corresponde. De lo contrario, puede dejar vacio este campo</small>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="gravado" class="form-control-label">Gravado: </label>
            <input type="text" name="gravado" id="gravado" value="{{$venta->gravado ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Ingrese el valor Gravado, si corresponde. De lo contrario, puede dejar vacio este campo</small>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="iva_21" class="form-control-label">IVA 21%: </label>
            <input type="text" name="iva_21" id="iva_21" value="{{$venta->iva_21 ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Ingrese el valor IVA 21%, si corresponde. De lo contrario, puede dejar vacio este campo</small>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="total" class="form-control-label">Total: </label>
            <input type="text" name="total" id="total" value="{{$venta->total ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Ingrese el valor del total</small>
        </div>
    </div>

</div>

<button class="au-btn au-btn-icon au-btn--blue au-btn--small" type="submit">Guardar</button>

