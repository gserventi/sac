@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="title-5 m-b-35">Rubros</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-right">
                    <button class="au-btn au-btn-icon au-btn--blue au-btn--small">
                    <a class="item" style="color:white" href="{{route('rubro.create')}}"><i class="zmdi zmdi-plus"></i>Agregar Rubro</a></button>
                </div>
            </div>

            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                    <tr>
                        <th>@sortablelink('id','Codigo')</th>
                        <th>@sortablelink('nombre','Nombre')</th>
                        <th>@sortablelink('activo','Activo')</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($rubros as $rubro)
                            <tr class="tr-shadow">
                                <td>{{$rubro->id}}</td>
                                <td>{{$rubro->nombre}}</td>
                                <td><input type="checkbox" name="activo" value="" {{ ($rubro->activo == 1 ? 'checked' : '') }} disabled></td>
                                <td>
                                    <div class="table-data-feature">
                                        <a class="item" href="{{route('rubro.edit',$rubro->id)}}" title="Editar"><i class="zmdi zmdi-edit"></i></a>
                                        {{--<form action="{{ route('rubro.destroy',$rubro->id) }}" method="post">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button class="item" type="submit" onclick="return confirm('¿Quieres desactivar este rubro?')"><i class="zmdi zmdi-delete"></i></button>
                                        </form>--}}
                                    </div>
                                </td>
                            </tr>
                            <tr class="spacer"></tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $rubros->appends(Request::except('page'))->render() !!}
                <p>
                    Mostrando {{$rubros->firstItem()}}-{{$rubros->lastItem()}} de {{ $rubros->total() }} rubro(s).
                </p>
        </div>
    </div>
@endsection
