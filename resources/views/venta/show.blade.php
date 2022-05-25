@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 table-data__tool">
            <button class="au-btn au-btn-icon au-btn--blue au-btn--small">
                <a class="item" style="color:white" href="{{route('venta.index')}}"><i class="zmdi zmdi-chevron-left"></i>Volver atras</a></button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Detalle de Venta</strong>
                </div>
                <div class="card-body card-block">
                    <form action method="post" novalidate="novalidate" class="form-horizontal">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="id_periodo" class="form-control-label">Periodo: </label>
                                    <input type="text" name="id_periodo" id="id_periodo" value="{{$venta->periodo->nombre ?? ''}}" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="form-group">
                                    <label for="id_cliente" class="form-control-label">Cliente: </label>
                                    <input type="text" name="id_cliente" id="id_cliente" value="{{$venta->cliente->nombre ?? ''}}" class="form-control" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="fecha_comprobante" class="form-control-label">Fecha de Comprobante: </label>
                                    <input type="date" name="fecha_comprobante" id="fecha_comprobante" value="{{$venta->fecha_comprobante ?? ''}}" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="id_punto_de_venta" class="form-control-label">Punto de Venta: </label>
                                    <input type="text" name="id_punto_de_venta" id="id_punto_de_venta" value="{{$venta->puntoDeVenta->nombre ?? ''}}" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="numero_comprobante" class="form-control-label">Numero de Comprobante: </label>
                                    <input type="text" name="numero_comprobante" id="numero_comprobante" value="{{$venta->numero_comprobante ?? ''}}" class="form-control" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="no_gravado" class="form-control-label">No Gravado: </label>
                                    <input type="text" name="no_gravado" id="no_gravado" value="{{$venta->no_gravado ?? ''}}" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="gravado" class="form-control-label">Gravado: </label>
                                    <input type="text" name="gravado" id="gravado" value="{{$venta->gravado ?? ''}}" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="iva_21" class="form-control-label">IVA 21%: </label>
                                    <input type="text" name="iva_21" id="iva_21" value="{{$venta->iva_21 ?? ''}}" class="form-control" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="total" class="form-control-label">Total: </label>
                                    <input type="text" name="total" id="total" value="{{$venta->total ?? ''}}" class="form-control" disabled>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection



