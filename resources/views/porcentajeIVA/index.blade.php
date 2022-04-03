@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="title-5 m-b-35">Porcentajes de IVA</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-right">
                    <button class="au-btn au-btn-icon au-btn--blue au-btn--small">
                        <a class="item" style="color:white" href="{{route('porcentajeIVA.create')}}"><i class="zmdi zmdi-plus"></i>Agregar Porcentaje de IVA</a></button>
                </div>
            </div>

            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                    <tr>
                        <th>@sortablelink('id','Codigo')</th>
                        <th>@sortablelink('porcentaje','Porcentaje')</th>
                        <th>@sortablelink('activo','Activo')</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($porcentajes_iva as $porcentajeIVA)
                        <tr class="tr-shadow">
                            <td>{{$porcentajeIVA->id}}</td>
                            <td>{{$porcentajeIVA->porcentaje}} %</td>
                            <td><input type="checkbox" name="activo" value="" {{ ($porcentajeIVA->activo == 1 ? 'checked' : '') }} disabled></td>
                            <td>
                                <div class="table-data-feature">
                                    <a class="item" href="{{route('porcentajeIVA.edit',$porcentajeIVA->id)}}" title="Editar"><i class="zmdi zmdi-edit"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr class="spacer"></tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $porcentajes_iva->appends(Request::except('page'))->render() !!}
                <p>
                    Mostrando {{$porcentajes_iva->firstItem()}}-{{$porcentajes_iva->lastItem()}} de {{ $porcentajes_iva->total() }} porcentaje(s) de IVA.
                </p>
            </div>
        </div>
@endsection

