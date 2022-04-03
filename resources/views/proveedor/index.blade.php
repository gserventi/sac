@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="title-5 m-b-35">Proveedores</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-right">
                    <button class="au-btn au-btn-icon au-btn--blue au-btn--small">
                    <a class="item" style="color:white" href="{{route('proveedor.create')}}"><i class="zmdi zmdi-plus"></i>Agregar Proveedor</a></button>
                </div>
            </div>

            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                    <tr>
                        <th>@sortablelink('id','Codigo')</th>
                        <th>@sortablelink('nombre','Nombre')</th>
                        <th>@sortablelink('cuit','CUIT')</th>
                        <th>@sortablelink('email','Email')</th>
                        <th>@sortablelink('telefono','Telefono')</th>
                        <th>@sortablelink('rubro','Rubro')</th>
                        <th>@sortablelink('observaciones','Observaciones')</th>
                        <th>@sortablelink('activo','Activo')</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($proveedores as $proveedor)
                            <tr class="tr-shadow">
                                <td>{{$proveedor->id}}</td>
                                <td>{{$proveedor->nombre}}</td>
                                <td>{{$proveedor->cuit_con_formato($proveedor->cuit)}}</td>
                                <td>{{$proveedor->email}}</td>
                                <td>{{$proveedor->telefono}}</td>
                                <td>{{$proveedor->rubro->nombre}}</td>
                                <td>{{$proveedor->observaciones}}</td>
                                <td><input type="checkbox" name="activo" value="" {{ ($proveedor->activo == 1 ? 'checked' : '') }} disabled></td>
                                <td>
                                    <div class="table-data-feature">
                                        <a class="item" href="{{route('proveedor.edit',$proveedor->id)}}" title="Editar"><i class="zmdi zmdi-edit"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="spacer"></tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $proveedores->appends(Request::except('page'))->render() !!}
                <p>
                    Mostrando {{$proveedores->firstItem()}}-{{$proveedores->lastItem()}} de {{ $proveedores->total() }} proveedores(s).
                </p>
        </div>
    </div>
@endsection
