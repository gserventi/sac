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
    {{--    <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="nombre" class="form-control-label">Nombre: </label>
                <input type="text" name="nombre" id="nombre" value="{{$periodo->nombre ?? ''}}" class="form-control">
                <small class="form-text small-text-light">Escriba el nombre del periodo</small>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="cerrado" class="form-control-label">Cerrado: </label>
                <input type="checkbox" name="cerrado" id="cerrado" value="{{$periodo->cerrado ?? ''}}" class="form-check" @if((isset($periodo->cerrado) && $periodo->cerrado== 1))  checked @else '' @endif>
                <small class="form-text small-text-light">Marque este casillero para cerrar el periodo</small>
            </div>
        </div>--}}

    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="nombre" class="form-control-label">Periodo: </label>
            <input type="month" name="nombre" id="nombre" value="{{$periodo->nombre ?? ''}}" class="form-control">
            <small class="form-text small-text-light">Seleccione el mes y año del periodo</small>
        </div>
    </div>

</div>

<button class="au-btn au-btn-icon au-btn--blue au-btn--small" type="submit">Guardar</button>
