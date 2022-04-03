@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="title-5 m-b-35">Formas de Pago</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-right">
                    <button class="au-btn au-btn-icon au-btn--blue au-btn--small">
                        <a class="item" style="color:white" href="{{route('formaDePago.create')}}"><i class="zmdi zmdi-plus"></i>Agregar Forma de Pago</a></button>
                </div>
            </div>

            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                    <tr>
                        <th>@sortablelink('id','Codigo')</th>
                        <th>@sortablelink('nombre','Nombre')</th>
                        <th>@sortablelink('activo_ventas','Activo en Ventas')</th>
                        <th>@sortablelink('activo_compras','Activo en Compras')</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($formas_de_pago as $formaDePago)
                        <tr class="tr-shadow">
                            <td>{{$formaDePago->id}}</td>
                            <td>{{$formaDePago->nombre}}</td>
                            <td><input type="checkbox" name="activo_ventas" value="" {{ ($formaDePago->activo_ventas == 1 ? 'checked' : '') }} disabled></td>
                            <td><input type="checkbox" name="activo_compras" value="" {{ ($formaDePago->activo_compras == 1 ? 'checked' : '') }} disabled></td>
                            <td>
                                <div class="table-data-feature">
                                    <a class="item" href="{{route('formaDePago.edit',$formaDePago->id)}}" title="Editar"><i class="zmdi zmdi-edit"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr class="spacer"></tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $formas_de_pago->appends(Request::except('page'))->render() !!}
                <p>
                    Mostrando {{$formas_de_pago->firstItem()}}-{{$formas_de_pago->lastItem()}} de {{ $formas_de_pago->total() }} forma(s) de pago.
                </p>
            </div>
        </div>
@endsection

