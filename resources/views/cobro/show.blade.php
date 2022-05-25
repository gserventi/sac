@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 table-data__tool">
            <button class="au-btn au-btn-icon au-btn--blue au-btn--small">
                <a class="item" style="color:white" href="{{route('cobro.index')}}"><i class="zmdi zmdi-chevron-left"></i>Volver atras</a></button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Detalle de Cobro</strong>
                </div>

                <div class="card-body card-block">
                    <form action method="post" novalidate="novalidate" class="form-horizontal">
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="id" class="form-control-label">Codigo: </label>
                                    <input type="text" name="id" id="id" value="{{$cobro->id ?? ''}}" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="fecha_cobro" class="form-control-label">Fecha de Cobro: </label>
                                    <input type="text" name="fecha_cobro" id="fecha_cobro" value="@if(isset($cobro->fecha_cobro)) {{date('d/m/Y', strtotime($cobro->fecha_cobro))}} @endif " class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="id_cliente" class="form-control-label">Cliente: </label>
                                    <input type="text" name="id_cliente" id="id_cliente" value="{{$cobro->cliente->nombre ?? ''}}" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="id_forma_de_pago" class="form-control-label">Forma de Pago: </label>
                                    <input type="text" name="id_forma_de_pago" id="id_forma_de_pago" value="{{$cobro->formaDePago->nombre ?? ''}}" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="total" class="form-control-label">Total: </label>
                                    <input type="text" name="total" id="total" value="@if($cobro->total > 0) $ {{number_format($cobro->total, 2)}} @else - @endif" class="form-control" disabled>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="table-responsive m-b-40">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                    <tr>
                                        <th>Codigo de Venta</th>
                                        <th>Fecha de Comprobante</th>
                                        <th>Numero de Comprobante</th>
                                        <th>Importe Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($detallesCobro as $detalleCobro)
                                        <tr>
                                            <td>{{$detalleCobro->id}}</td>
                                            <td>@if(isset($detalleCobro->fecha_comprobante)) {{date('d/m/Y', strtotime($detalleCobro->fecha_comprobante))}} @endif </td>
                                            <td>{{$detalleCobro->numero_comprobante}}</td>
                                            <td>{{$detalleCobro->total}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

