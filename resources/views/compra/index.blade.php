@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="title-5 m-b-35">Compras</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-right">
                    <button class="au-btn au-btn-icon au-btn--blue au-btn--small">
                        <a class="item" style="color:white" href="{{route('compra.create')}}"><i class="zmdi zmdi-plus"></i>Agregar Compra</a></button>
                </div>
            </div>

            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-earning table-data3">
                    <thead>
                    <tr>
                        <th>@sortablelink('id','Codigo')</th>
                        <th>@sortablelink('id_periodo','Periodo')</th>
                        <th>@sortablelink('fecha_comprobante','Fecha')</th>
                        <th>@sortablelink('id_tipo_comprobante','Tipo de Comprobante')</th>
                        <th>@sortablelink('numero_comprobante','Numero de Comprobante')</th>
                        <th>@sortablelink('id_proveedor','Proveedor')</th>
                        <th>@sortablelink('exento','Exento')</th>
                        <th>@sortablelink('no_gravado','No Gravado')</th>
                        <th>@sortablelink('gravado','Gravado')</th>
                        <th>@sortablelink('iva_21','IVA 21%')</th>
                        <th>@sortablelink('iva_27','IVA 27%')</th>
                        <th>@sortablelink('iva_105','IVA 10.5%')</th>
                        <th>@sortablelink('percepcion_iva_RG3337_3','Percep.IVA RG 3337 3%')</th>
                        <th>@sortablelink('percepcion_iva_RG3337_105','Percep.IVA RG 3337 10.5%')</th>
                        <th>@sortablelink('percepcion_iibb_caba_15','Percep.IIBB CABA 1.5%')</th>
                        <th>@sortablelink('percepcion_iibb_ba_01','Percep.IIBB BA 0.1%')</th>
                        <th>@sortablelink('neto','Neto')</th>
                        <th>@sortablelink('pagada','Pagada')</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($compras as $compra)
                        <tr class="tr-shadow">
                            <td>{{$compra->id}}</td>
                            <td>{{$compra->periodo->nombre}}</td>
                            <td>@if(isset($compra->fecha_comprobante)) {{date('d/m/Y', strtotime($compra->fecha_comprobante))}} @endif </td>
                            <td>{{$compra->tipoDeComprobante->nombre}}</td>
                            <td>{{$compra->numero_comprobante}}</td>
                            <td>{{$compra->proveedor->nombre}}</td>
                            <td>@if($compra->exento > 0) $ {{number_format($compra->exento, 2)}} @else - @endif</td>
                            <td>@if($compra->no_gravado > 0) $ {{number_format($compra->no_gravado, 2)}} @else - @endif</td>
                            <td>@if($compra->gravado > 0) $ {{number_format($compra->gravado, 2)}} @else - @endif</td>
                            <td>@if($compra->iva_21 > 0) $ {{number_format($compra->iva_21, 2)}} @else - @endif</td>
                            <td>@if($compra->iva_27 > 0) $ {{number_format($compra->iva_27, 2)}} @else - @endif</td>
                            <td>@if($compra->iva_105 > 0) $ {{number_format($compra->iva_105, 2)}} @else - @endif</td>
                            <td>@if($compra->percepcion_iva_RG3337_3 > 0) $ {{number_format($compra->percepcion_iva_RG3337_3, 2)}} @else - @endif</td>
                            <td>@if($compra->percepcion_iva_RG3337_105 > 0) $ {{number_format($compra->percepcion_iva_RG3337_105, 2)}} @else - @endif</td>
                            <td>@if($compra->percepcion_iibb_caba_15 > 0) $ {{number_format($compra->percepcion_iibb_caba_15, 2)}} @else - @endif</td>
                            <td>@if($compra->percepcion_iibb_ba_01 > 0) $ {{number_format($compra->percepcion_iibb_ba_01, 2)}} @else - @endif</td>
                            <td>@if($compra->neto > 0) $ {{number_format($compra->neto, 2)}} @else - @endif</td>
                            <td><input type="checkbox" name="pagada" value="" {{ ($compra->pagada == 1 ? 'checked' : '') }} disabled></td>
                            <td>
                                <div class="table-data-feature">
                                    <a class="item" href="{{route('compra.edit',$compra->id)}}" title="Editar"><i class="zmdi zmdi-edit"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr class="spacer"></tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $compras->appends(Request::except('page'))->render() !!}
                <p>
                    Mostrando {{$compras->firstItem()}}-{{$compras->lastItem()}} de {{ $compras->total() }} compra(s).
                </p>
            </div>
        </div>
@endsection

