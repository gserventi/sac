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
                    <form action="{{route('pago.store')}}" method="post" enctype="multipart/form-data"
                          class="form-horizontal">
                        @csrf

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="fecha_pago" class="form-control-label">Fecha de Pago: </label>
                                    <input type="date" name="fecha_pago" id="fecha_pago" value="{{$pago->fecha_pago ?? date('Y-m-d')}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="id_proveedor" class="form-control-label">Proveedor: </label>
                                    <select name="id_proveedor" id="select" class="form-control">
                                        <option selected value=""></option>
                                        @foreach($proveedores as $proveedor)
                                            <option value="{{$proveedor->id ?? ''}}">{{$proveedor->nombre ?? ''}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
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
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="total" class="form-control-label">Total: </label>
                                    <input type="text" name="total" id="total"  class="form-control" value="{{$pago->total ?? ''}}">
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
                                    </tr>
                                    </thead>
                                    <tbody>

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

