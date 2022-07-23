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
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="nombre" class="form-control-label">Nombre: </label>
            <input type="text" name="nombre" id="nombre" value="{{$formaDePago->nombre ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Escriba el nombre de la forma de pago</small>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="es_cheque" class="form-control-label">Es Cheque?: </label>
            <input type="checkbox" name="es_cheque" id="es_cheque" value="{{$formaDePago->es_cheque ?? ''}}" class="form-check" @if((isset($formaDePago->es_cheque) && $formaDePago->es_cheque== 1))  checked @else '' @endif>
            <small class="form-text small-text-light">Marque este casillero para indicar que esta forma de pago es del tipo Cheque</small>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="activo_ventas" class="form-control-label">Activo en Ventas: </label>
            <input type="checkbox" name="activo_ventas" id="activo_ventas" value="{{$formaDePago->activo_ventas ?? ''}}" class="form-check" @if((isset($formaDePago->activo_ventas) && $formaDePago->activo_ventas== 1))  checked @else '' @endif>
            <small class="form-text small-text-light">Marque este casillero para que esta forma de pago se pueda utilizar en Ventas</small>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="activo_compras" class="form-control-label">Activo en Compras: </label>
            <input type="checkbox" name="activo_compras" id="activo_compras" value="{{$formaDePago->activo_compras ?? ''}}" class="form-check" @if((isset($formaDePago->activo_compras) && $formaDePago->activo_compras== 1))  checked @else '' @endif>
            <small class="form-text small-text-light">Marque este casillero para que esta forma de pago se pueda utilizar en Compras</small>
        </div>
    </div>
</div>

<button class="au-btn au-btn-icon au-btn--blue au-btn--small" type="submit">Guardar</button>

