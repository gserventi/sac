@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <section class="statistic statistic2">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item statistic__item--green">
                                    <a href="{{route('venta.ventasSinCobrar')}}">
                                        <h2 class="number">$ {{number_format($ventasSinCobrar,2)}}</h2>
                                        <span class="desc">Ventas sin cobrar</span>
                                        <div class="icon">
                                            <i class="fas fa-shopping-cart"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item statistic__item--red">
                                    <a href="{{route('compra.comprasSinPagar')}}">
                                        <h2 class="number">$ {{number_format($comprasSinPagar,2)}}</h2>
                                        <span class="desc">Compras sin pagar</span>
                                        <div class="icon">
                                            <i class="fas fa-shopping-bag"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item statistic__item--blue">
                                    <a href="{{route('venta.ventasDelMes')}}">
                                        <h2 class="number">$ {{number_format($ventasDelMes,2)}}</h2>
                                        <span class="desc">Vendido en el mes</span>
                                        <div class="icon">
                                            <i class="fas fa-dollar"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item statistic__item--orange">
                                    <a href="{{route('compra.comprasDelMes')}}">
                                        <h2 class="number">$ {{number_format($comprasDelMes,2)}}</h2>
                                        <span class="desc">Comprado en el mes</span>
                                        <div class="icon">
                                            <i class="fas fa-money-bill-alt"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                </section>
                <section class="p-t-20">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="title-1 m-b-25">Resumen Posicion IVA {{ now()->year }}</h2>
                            </div>
                            <div class="table-responsive m-b-40">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                    <tr>
                                        <th>Periodo</th>
                                        <th>IVA Ventas</th>
                                        <th>IVA Compras</th>
                                        <th>Diferencia</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @foreach($resumenesPeriodos as $resumenPeriodo)
                                            <td>{{$resumenPeriodo->nombre}}</td>
                                            <td>$ {{number_format($resumenPeriodo->total_iva_ventas, 2)}}</td>
                                            <td>$ {{number_format($resumenPeriodo->total_iva_compras, 2)}}</td>
                                            <td>$ {{number_format($resumenPeriodo->diferencia, 2)}}</td>
                                        @endforeach
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
