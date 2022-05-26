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
                    <strong>Crear Cobro</strong>
                </div>
                <div class="card-body card-block">
                    <form action="{{route('cobro.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                                    <label for="fecha_cobro" class="form-control-label">Fecha de Cobro: </label>
                                    <input type="date" name="fecha_cobro" id="fecha_cobro" value="{{$cobro->fecha_cobro ?? date('Y-m-d')}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="id_cliente" class="form-control-label">Cliente: </label>
                                    <select name="id_cliente" id="select" class="form-control">
                                        <option selected value="{{$cliente->id ?? ''}}">{{$cliente->nombre ?? ''}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="id_forma_de_pago" class="form-control-label">Forma de Pago: </label>
                                    <select name="id_forma_de_pago" id="select" class="form-control">
                                        <option selected value=""></option>
                                        @foreach($formas_de_pago as $formaDePago)
                                            <option value="{{$formaDePago->id ?? ''}}">{{$formaDePago->nombre ?? ''}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="table-responsive m-b-40">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                    <tr>
                                        <th>Codigo de Venta</th>
                                        <th>Fecha de Comprobante</th>
                                        <th>Numero de Comprobante</th>
                                        <th>Importe Total</th>
                                        <th>Pagar?</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ventas as $venta)
                                        <tr class="tr-shadow">
                                            <td>{{$venta->id}}</td>
                                            <td>{{date('d/m/Y', strtotime($venta->fecha_comprobante))}}</td>
                                            <td>{{$venta->numero_comprobante}}</td>
                                            <td>$ <span id="valorNeto-{{$venta->id}}">{{$venta->total}}</span></td>
                                            <td>
                                                <input type="checkbox" name="checkCobrar-{{$venta->id}}" id="checkCobrar-{{$venta->id}}"
                                                       onclick="calcularTotal('checkCobrar-{{$venta->id}}','valorNeto-{{$venta->id}}', 'cobroTotal')">
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
                                    <label for="total" class="form-control-label">Total: </label>
                                    <input type="number" name="total" id="cobroTotal" class="form-control" value="{{$cobro->total ?? '0.00'}}" step=".01">
                                </div>
                            </div>
                        </div>

                        <button class="au-btn au-btn-icon au-btn--blue au-btn--small" type="submit">Guardar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


