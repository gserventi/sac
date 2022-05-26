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
            <input type="text" name="nombre" id="nombre" value="{{$cliente->nombre ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Escriba el nombre del cliente</small>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="cuit" class="form-control-label">CUIT: </label>
            <input type="text" name="cuit" id="cuit" value="{{$cliente->cuit ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Escriba el numero de CUIT sin guiones</small>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="dias_cobro" class="form-control-label">Dias de Pago: </label>
            <input type="text" name="dias_cobro" id="dias_cobro" value="{{$cliente->dias_cobro ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Escriba la cantidad de dias de cobro</small>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="email" class="form-control-label">Email: </label>
            <input type="text" name="email" id="email" value="{{$cliente->email ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Escriba la direccion de email</small>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="telefono" class="form-control-label">Telefono: </label>
            <input type="text" name="telefono" id="telefono" value="{{$cliente->telefono ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Escriba el numero de telefono</small>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="observaciones" class="form-control-label">Observaciones: </label>
            <textarea name="observaciones" id="observaciones" rows="5" class="form-control">{{$cliente->observaciones ?? ''}}</textarea>
            <small class="form-text small-text-light">Escriba alguna observacion para este cliente</small>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="activo" class="form-control-label">Activo: </label>
            <input type="checkbox" name="activo" id="activo" value="{{$cliente->activo ?? ''}}" class="form-check" @if((isset($cliente->activo) && $cliente->activo== 1))  checked @else '' @endif>
            <small class="form-text small-text-light">Desmarque este casillero para que el cliente no se pueda usar en el sistema</small>
        </div>
    </div>
</div>

<button class="au-btn au-btn-icon au-btn--blue au-btn--small" type="submit">Guardar</button>

