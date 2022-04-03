@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="title-5 m-b-35">Clientes</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-right">
                    <button class="au-btn au-btn-icon au-btn--blue au-btn--small">
                        <a class="item" style="color:white" href="{{route('cliente.create')}}"><i class="zmdi zmdi-plus"></i>Agregar Cliente</a></button>
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
                        <th>@sortablelink('dias_cobro','Dias de Cobro')</th>
                        <th>@sortablelink('observaciones','Observaciones')</th>
                        <th>@sortablelink('activo','Activo')</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clientes as $cliente)
                        <tr class="tr-shadow">
                            <td>{{$cliente->id}}</td>
                            <td>{{$cliente->nombre}}</td>
                            <td>{{$cliente->cuit_con_formato($cliente->cuit)}}</td>
                            <td>{{$cliente->email}}</td>
                            <td>{{$cliente->telefono}}</td>
                            <td>{{$cliente->dias_cobro}}</td>
                            <td>{{$cliente->observaciones}}</td>
                            <td><input type="checkbox" name="activo" value="" {{ ($cliente->activo == 1 ? 'checked' : '') }} disabled></td>
                            <td>
                                <div class="table-data-feature">
                                    <a class="item" href="{{route('cliente.edit',$cliente->id)}}" title="Editar"><i class="zmdi zmdi-edit"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr class="spacer"></tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $clientes->appends(Request::except('page'))->render() !!}
                <p>
                    Mostrando {{$clientes->firstItem()}}-{{$clientes->lastItem()}} de {{ $clientes->total() }} cliente(s).
                </p>
            </div>
        </div>
@endsection

