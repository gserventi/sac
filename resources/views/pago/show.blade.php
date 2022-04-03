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
                    <strong>Detalle de Pago</strong>
                </div>

                <div class="card-body card-block">
                    <form action method="post" novalidate="novalidate" class="form-horizontal">
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="id" class="form-control-label">Codigo: </label>
                                    <input type="text" name="id" id="id" value="{{$pago->id ?? ''}}" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="fecha_pago" class="form-control-label">Fecha de Pago: </label>
                                    <input type="text" name="fecha_pago" id="fecha_pago" value="@if(isset($pago->fecha_pago)) {{date('d/m/Y', strtotime($pago->fecha_pago))}} @endif " class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="id_proveedor" class="form-control-label">Proveedor: </label>
                                    <input type="text" name="id_proveedor" id="id_proveedor" value="{{$pago->proveedor->nombre ?? ''}}" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="id_forma_de_pago" class="form-control-label">Forma de Pago: </label>
                                    <input type="text" name="id_forma_de_pago" id="id_forma_de_pago" value="{{$pago->formaDePago->nombre ?? ''}}" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="total" class="form-control-label">Total: </label>
                                    <input type="text" name="total" id="total" value="@if($pago->total > 0) $ {{number_format($pago->total, 2)}} @else - @endif" class="form-control" disabled>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
