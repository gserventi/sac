@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 table-data__tool">
            <button class="au-btn au-btn-icon au-btn--blue au-btn--small">
                <a class="item" style="color:white" href="{{route('pago.index')}}"><i class="zmdi zmdi-chevron-left"></i>Volver atras</a></button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Crear Pago</strong>
                </div>
                <div class="card-body card-block">
                    <form action="{{route('pago.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @csrf

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
                                    <label for="fecha_pago" class="form-control-label">Fecha de Pago: </label>
                                    <input type="date" name="fecha_pago" id="fecha_pago" value="{{$pago->fecha_pago ?? date('Y-m-d')}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="id_proveedor" class="form-control-label" hidden>Proveedor: </label>
                                    <select name="id_proveedor" id="select" class="form-control" hidden>
                                        <option selected value="{{$proveedor->id ?? ''}}">{{$proveedor->nombre ?? ''}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

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
                                        <th>Pagar?</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($compras as $compra)
                                            <tr class="tr-shadow">
                                                <td>{{$compra->id}}</td>
                                                <td>{{date('d/m/Y', strtotime($compra->fecha_comprobante))}}</td>
                                                <td>{{$compra->tipoDeComprobante->nombre}}</td>
                                                <td>{{$compra->numero_comprobante}}</td>
                                                <td>$ <span id="valorNeto-{{$compra->id}}">{{$compra->neto}}</span></td>
                                                <td>
                                                    <input type="checkbox" name="checkPagar-{{$compra->id}}" id="checkPagar-{{$compra->id}}"
                                                           onclick="calcularTotal('checkPagar-{{$compra->id}}', 'valorNeto-{{$compra->id}}', 'pagoTotal')">
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-3"></div>
                            <div class="col-12 col-md-3"></div>
                            <div class="col-12 col-md-3"></div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="total" class="form-control-label">Total Comprobantes: </label>
                                    <input type="number" name="pagoTotal" id="pagoTotal" class="form-control" value="{{$pago->total ?? '0.00'}}" step=".01" readonly="true">
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <input type="button" name="agregarPago" class="au-btn au-btn-icon au-btn--blue au-btn--small" onclick="mostrarAgregarPagos()" value="+ Agregar Pago"></input>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="agregar-pagos" style="display: none">
                            <div class="table-responsive m-b-40">
                                <table class="table table-bordered table-data3" id="dynamicAddRemove">
                                    <thead>
                                        <tr>
                                            <th>Forma de Pago</th>
                                            <th>Importe</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <select name="formasDePago[0][id]" id="formasDePago[0][id]" class="form-control">
                                                <option selected value="{{$proveedor->id_forma_de_pago_default}}">{{$proveedor->formaDePago->nombre}}</option>
                                                @foreach($formas_de_pago as $formaDePago)
                                                    <option value="{{$formaDePago->id ?? ''}}">{{$formaDePago->nombre ?? ''}}</option>
                                                @endforeach
                                                </select>
                                            </td>
                                            <td><input type="number" name="formasDePago[0][importe]" id="formasDePago[0][importe]" class="form-control" /></td>
                                            <td><input type="button" name="sumarPago" id="formasDePago[0][sumarPago]" class="au-btn au-btn-icon au-btn--blue au-btn--small" onclick="sumarPagoPagar('formasDePago[0][importe]','totalPagos', 'formasDePago[0][sumarPago]', 'formasDePago[0][id]')" value="+" /></td>
                                            <td><button type="button" name="add" id="add-btn" class="btn btn-success">Agregar</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row" id="total-pagos" style="display: none">
                            <div class="col-12 col-md-3"></div>
                            <div class="col-12 col-md-3"></div>
                            <div class="col-12 col-md-3"></div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="totalPagos" class="form-control-label">Total Pagos: </label>
                                    <input type="number" name="totalPagos" id="totalPagos" class="form-control" value="0.00" step=".01" readonly="true">
                                </div>
                            </div>
                        </div>

                        <hr>

                        <button class="au-btn au-btn-icon au-btn--blue au-btn--small" type="submit" id="boton-guardar" disabled="true">Guardar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var i = 0;
        $("#add-btn").click(function(){
            ++i;
            $("#dynamicAddRemove").append('<tr><td>    <select name="formasDePago['+i+'][id]" id="formasDePago['+i+'][id]" class="form-control"><option selected value="{{$proveedor->id_forma_de_pago_default}}">{{$proveedor->formaDePago->nombre}}</option>@foreach($formas_de_pago as $formaDePago)<option value="{{$formaDePago->id ?? ''}}">{{$formaDePago->nombre ?? ''}}</option>@endforeach</select></td><td><input type="text" name="formasDePago['+i+'][importe]" id="formasDePago['+i+'][importe]" class="form-control" /></td><td><input type="button" name="sumarPago" id="formasDePago['+i+'][sumarPago]" class="au-btn au-btn-icon au-btn--blue au-btn--small" onclick="sumarPagoPagar(\'formasDePago['+i+'][importe]\',\'totalPagos\', \'formasDePago['+i+'][sumarPago]\',\'formasDePago['+i+'][id]\' )" value="+" /></td><td><button type="button" class="btn btn-danger remove-tr">Eliminar</button></td></tr>');
        });
        $(document).on('click', '.remove-tr', function(){
            let fila = $(this).closest('tr');
            let col2 = fila.find('td:eq(1) input').val();
            let total = document.getElementById('totalPagos');
            let tot;
            if(isNaN(total.value)||(total.value===0)) {tot = 0;} else {tot=parseFloat(total.value);}
            if ( (parseFloat(col2)) && (total.value !== 0) ) {
                tot -= parseFloat(col2);
            }
            total.value = tot.toFixed(2);
            $(this).parents('tr').remove();
        });
    </script>
@endsection

