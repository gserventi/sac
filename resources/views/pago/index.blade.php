@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="title-5 m-b-35">Pagos</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-right">
                    <button class="au-btn au-btn-icon au-btn--blue au-btn--small">
                        <a class="item" style="color:white" href="{{route('pago.selectProveedor')}}"><i class="zmdi zmdi-plus"></i>Agregar Pago</a></button>
                </div>
            </div>

            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                    <tr>
                        <th>@sortablelink('id','Codigo')</th>
                        <th>@sortablelink('fecha_pago','Fecha de Pago')</th>
                        <th>@sortablelink('id_proveedor', 'Proveedor')</th>
                        <th>@sortablelink('total','Total')</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pagos as $pago)
                        <tr class="tr-shadow">
                            <td>{{$pago->id}}</td>
                            <td>@if(isset($pago->fecha_pago)) {{date('d/m/Y', strtotime($pago->fecha_pago))}} @endif </td>
                            <td>{{$pago->proveedor->nombre}}</td>
                            <td>@if($pago->total > 0) $ {{number_format($pago->total, 2)}} @else - @endif</td>
                            <td>
                                <div class="table-data-feature">
                                    <a class="item" href="{{route('pago.show',$pago->id)}}" title="Mostrar"><i class="zmdi zmdi-view-list"></i></a>
{{--                                    <a class="item" href="{{route('pago.edit',$pago->id)}}" title="Editar"><i class="zmdi zmdi-edit"></i></a>--}}
                                </div>
                            </td>
                        </tr>
                        <tr class="spacer"></tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $pagos->appends(Request::except('page'))->render() !!}
                <p>
                    Mostrando {{$pagos->firstItem()}}-{{$pagos->lastItem()}} de {{ $pagos->total() }} pago(s).
                </p>
            </div>
        </div>
@endsection

