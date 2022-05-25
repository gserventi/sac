@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="title-5 m-b-35">Ventas</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-right">
                    <button class="au-btn au-btn-icon au-btn--blue au-btn--small">
                        <a class="item" style="color:white" href="{{route('venta.create')}}"><i class="zmdi zmdi-plus"></i>Agregar Venta</a></button>
                </div>
            </div>

            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-earning table-data3">
                    <thead>
                    <tr>
                        <th>@sortablelink('id','Codigo')</th>
                        <th>@sortablelink('id_periodo','Periodo')</th>
                        <th>@sortablelink('fecha_comprobante','Fecha')</th>
                        <th>@sortablelink('id_punto_de_venta','Punto de Venta')</th>
                        <th>@sortablelink('numero_comprobante','Numero de Comprobante')</th>
                        <th>@sortablelink('id_cliente','Cliente')</th>
                        <th>@sortablelink('no_gravado','No Gravado')</th>
                        <th>@sortablelink('gravado','Gravado')</th>
                        <th>@sortablelink('iva_21','IVA 21%')</th>
                        <th>@sortablelink('total','Total')</th>
                        <th>@sortablelink('cobrada','Cobrada')</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ventas as $venta)
                        <tr class="tr-shadow">
                            <td>{{$venta->id}}</td>
                            <td>{{$venta->periodo->nombre}}</td>
                            <td>@if(isset($venta->fecha_comprobante)) {{date('d/m/Y', strtotime($venta->fecha_comprobante))}} @endif </td>
                            <td>{{$venta->puntoDeVenta->nombre}}</td>
                            <td>{{$venta->numero_comprobante}}</td>
                            <td>{{$venta->cliente->nombre}}</td>
                            <td>@if($venta->no_gravado > 0) $ {{number_format($venta->no_gravado, 2)}} @else - @endif</td>
                            <td>@if($venta->gravado > 0) $ {{number_format($venta->gravado, 2)}} @else - @endif</td>
                            <td>@if($venta->iva_21 > 0) $ {{number_format($venta->iva_21, 2)}} @else - @endif</td>
                            <td>@if($venta->total > 0) $ {{number_format($venta->total, 2)}} @else - @endif</td>
                            <td><input type="checkbox" name="cobrada" value="" {{ ($venta->cobrada == 1 ? 'checked' : '') }} disabled></td>
                            <td>
                                <div class="table-data-feature">
                                    <a class="item" href="{{route('venta.show',$venta->id)}}" title="Mostrar"><i class="zmdi zmdi-view-list"></i></a>
{{--                                    <a class="item" href="{{route('venta.edit',$venta->id)}}" title="Editar"><i class="zmdi zmdi-edit"></i></a>--}}
                                </div>
                            </td>
                        </tr>
                        <tr class="spacer"></tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $ventas->appends(Request::except('page'))->render() !!}
                <p>
                    Mostrando {{$ventas->firstItem()}}-{{$ventas->lastItem()}} de {{ $ventas->total() }} venta(s).
                </p>
            </div>
        </div>

@endsection
