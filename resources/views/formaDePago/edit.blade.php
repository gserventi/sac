@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 table-data__tool">
            <button class="au-btn au-btn-icon au-btn--blue au-btn--small">
                <a class="item" style="color:white" href="{{route('formaDePago.index')}}"><i class="zmdi zmdi-chevron-left"></i>Volver atras</a></button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Editar Forma de Pago</strong>
                </div>
                <div class="card-body card-block">
                    <form action="{{route('formaDePago.update',$formaDePago->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        {{method_field('PATCH')}}
                        @include('formaDePago.form')
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
