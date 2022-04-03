@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="title-5 m-b-35">Tipos de Comprobantes</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-right">
                    <button class="au-btn au-btn-icon au-btn--blue au-btn--small">
                        <a class="item" style="color:white" href="{{route('tipoDeComprobante.create')}}"><i class="zmdi zmdi-plus"></i>Agregar Tipo de Comprobante</a></button>
                </div>
            </div>

            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                    <tr>
                        <th>@sortablelink('id','Codigo')</th>
                        <th>@sortablelink('nombre','Nombre')</th>
                        <th>@sortablelink('iva_compras','En IVA Compras')</th>
                        <th>@sortablelink('activo','Activo')</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tipos_de_comprobantes as $tipoDeComprobante)
                        <tr class="tr-shadow">
                            <td>{{$tipoDeComprobante->id}}</td>
                            <td>{{$tipoDeComprobante->nombre}}</td>
                            <td><input type="checkbox" name="iva_compras" value="" {{ ($tipoDeComprobante->iva_compras == 1 ? 'checked' : '') }} disabled></td>
                            <td><input type="checkbox" name="activo" value="" {{ ($tipoDeComprobante->activo == 1 ? 'checked' : '') }} disabled></td>
                            <td>
                                <div class="table-data-feature">
                                    <a class="item" href="{{route('tipoDeComprobante.edit',$tipoDeComprobante->id)}}" title="Editar"><i class="zmdi zmdi-edit"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr class="spacer"></tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $tipos_de_comprobantes->appends(Request::except('page'))->render() !!}
                <p>
                    Mostrando {{$tipos_de_comprobantes->firstItem()}}-{{$tipos_de_comprobantes->lastItem()}} de {{ $tipos_de_comprobantes->total() }} tipo(s) de comprobante(s).
                </p>
            </div>
        </div>
@endsection

