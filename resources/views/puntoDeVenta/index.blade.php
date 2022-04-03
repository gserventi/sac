@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="title-5 m-b-35">Rubros</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-right">
                    <button class="au-btn au-btn-icon au-btn--blue au-btn--small">
                        <a class="item" style="color:white" href="{{route('puntoDeVenta.create')}}"><i class="zmdi zmdi-plus"></i>Agregar Punto de Venta</a></button>
                </div>
            </div>

            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                    <tr>
                        <th>@sortablelink('id','Codigo')</th>
                        <th>@sortablelink('nombre','Nombre')</th>
                        <th>@sortablelink('prefijo','Prefijo')</th>
                        <th>@sortablelink('ultimo_numero','Ultimo Numero')</th>
                        <th>@sortablelink('activo','Activo')</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($puntos_de_venta as $puntoDeVenta)
                        <tr class="tr-shadow">
                            <td>{{$puntoDeVenta->id}}</td>
                            <td>{{$puntoDeVenta->nombre}}</td>
                            <td>{{$puntoDeVenta->prefijo}}</td>
                            <td>{{$puntoDeVenta->ultimo_numero}}</td>
                            <td><input type="checkbox" name="activo" value="" {{ ($puntoDeVenta->activo == 1 ? 'checked' : '') }} disabled></td>
                            <td>
                                <div class="table-data-feature">
                                    <a class="item" href="{{route('puntoDeVenta.edit',$puntoDeVenta->id)}}" title="Editar"><i class="zmdi zmdi-edit"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr class="spacer"></tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $puntos_de_venta->appends(Request::except('page'))->render() !!}
                <p>
                    Mostrando {{$puntos_de_venta->firstItem()}}-{{$puntos_de_venta->lastItem()}} de {{ $puntos_de_venta->total() }} rubro(s).
                </p>
            </div>
        </div>
@endsection

