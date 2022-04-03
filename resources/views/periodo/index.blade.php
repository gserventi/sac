@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="title-5 m-b-35">Periodos</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-right">
                    <button class="au-btn au-btn-icon au-btn--blue au-btn--small">
                        <a class="item" style="color:white" href="{{route('periodo.create')}}"><i class="zmdi zmdi-plus"></i>Agregar Periodo</a></button>
                </div>
            </div>

            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                    <tr>
                        <th>@sortablelink('id','Codigo')</th>
                        <th>@sortablelink('nombre','Nombre')</th>
                        <th>@sortablelink('cerrado','Cerrado')</th>
                        <th>@sortablelink('fecha_cierre','Fecha Cierre')</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($periodos as $periodo)
                        <tr class="tr-shadow">
                            <td>{{$periodo->id}}</td>
                            <td>{{$periodo->nombre}}</td>
                            <td><input type="checkbox" name="cerrado" value="" {{ ($periodo->cerrado == 1 ? 'checked' : '') }} disabled></td>
                            <td>@if(isset($periodo->fecha_cierre)) {{date('d/m/Y H:i', strtotime($periodo->fecha_cierre))}} @endif </td>
                            <td>
                                <div class="table-data-feature">
{{--                                    <a class="item" href="{{route('periodo.edit',$periodo->id)}}" title="Editar"><i class="zmdi zmdi-edit"></i></a>--}}
                                    <a class="item" href="{{route('periodo.cerrar',$periodo->id)}}" title="Cerrar"><i class="zmdi zmdi-close"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr class="spacer"></tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $periodos->appends(Request::except('page'))->render() !!}
                <p>
                    Mostrando {{$periodos->firstItem()}}-{{$periodos->lastItem()}} de {{ $periodos->total() }} periodo(s).
                </p>
            </div>
        </div>
@endsection

