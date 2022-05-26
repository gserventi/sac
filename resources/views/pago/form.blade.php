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
            <label for="fecha_pago" class="form-control-label">Fecha de Pago: </label>
            <input type="datetime-local" name="fecha_pago" id="fecha_pago" value="{{date('Y-m-d\TH:i', strtotime($pago->fecha_pago))}}" class="form-control">
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="id_proveedor" class="form-control-label">Proveedor: </label>
            <input type="text" name="id_proveedor" id="id_proveedor" value="{{$pago->proveedor->nombre ?? ''}}" class="form-control">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="id_forma_de_pago" class="form-control-label">Forma de Pago: </label>
            <input type="text" name="id_forma_de_pago" id="id_forma_de_pago" value="{{$pago->formaDePago->nombre ?? ''}}" class="form-control">
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="total" class="form-control-label">Total: </label>
            <input type="text" name="total" id="total" value="{{$pago->total ?? ''}}" class="form-control">
        </div>
    </div>
</div>

<br>

<div class="row">
    <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3">
            <thead>
            <tr>
                <th>Codigo de Compra</th>
                <th>Fecha de Comprobante</th>
                <th>Tipo de Comprobante</th>
                <th>Numero de Comprobante</th>
                <th>Importe Neto</th>
            </tr>
            </thead>
            <tbody>
            @foreach($detallesPago as $detallePago)
                <tr>
                    <td>{{$detallePago->id}}</td>
                    <td>@if(isset($detallePago->fecha_comprobante)) {{date('d/m/Y', strtotime($detallePago->fecha_comprobante))}} @endif </td>
                    <td>{{$detallePago->nombre}}</td>
                    <td>{{$detallePago->numero_comprobante}}</td>
                    <td>{{$detallePago->neto}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<button class="au-btn au-btn-icon au-btn--blue au-btn--small" type="submit">Guardar</button>

