@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="title-5 m-b-35">Cobros</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-right">
                    <button class="au-btn au-btn-icon au-btn--blue au-btn--small">
                        <a class="item" style="color:white" href="{{route('cobro.selectCliente')}}"><i class="zmdi zmdi-plus"></i>Agregar Cobro</a></button>
                </div>
            </div>

            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                    <tr>
                        <th>@sortablelink('id','Codigo')</th>
                        <th>@sortablelink('fecha_cobro','Fecha de Cobro')</th>
                        <th>@sortablelink('id_cliente', 'Cliente')</th>
                        <th>@sortablelink('total','Total')</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cobros as $cobro)
                        <tr class="tr-shadow">
                            <td>{{$cobro->id}}</td>
                            <td>@if(isset($cobro->fecha_cobro)) {{date('d/m/Y', strtotime($cobro->fecha_cobro))}} @endif </td>
                            <td>{{$cobro->cliente->nombre}}</td>
                            <td>@if($cobro->total > 0) $ {{number_format($cobro->total, 2)}} @else - @endif</td>
                            <td>
                                <div class="table-data-feature">
                                    <a class="item" href="{{route('cobro.show',$cobro->id)}}" title="Mostrar"><i class="zmdi zmdi-view-list"></i></a>
                                    {{--                                    <a class="item" href="{{route('pago.edit',$pago->id)}}" title="Editar"><i class="zmdi zmdi-edit"></i></a>--}}
                                </div>
                            </td>
                        </tr>
                        <tr class="spacer"></tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $cobros->appends(Request::except('page'))->render() !!}
                <p>
                    Mostrando {{$cobros->firstItem()}}-{{$cobros->lastItem()}} de {{ $cobros->total() }} cobro(s).
                </p>
            </div>
        </div>
@endsection

