@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 table-data__tool">
            <button class="au-btn au-btn-icon au-btn--blue au-btn--small">
                <a class="item" style="color:white" href="{{route('pago.index')}}"><i class="zmdi zmdi-chevron-left"></i>Volver atras</a></button>
        </div>
    </div>

    <form action="/sac/public/pago/crear/" method="post" enctype="multipart/form-data" class="form-horizontal" onsubmit="location.href = this.action + this.select.value; return false;">
        @csrf

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="id_proveedor" class="form-control-label">Proveedor: </label>
                    <select name="id_proveedor" id="select" class="form-control">
                        <option selected value=""></option>
                        @foreach($proveedores as $proveedor)
                            <option value="{{$proveedor->id ?? ''}}">{{$proveedor->nombre ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <button class="au-btn au-btn-icon au-btn--blue au-btn--small" type="submit">Siguiente</button>
    </form>

@endsection
