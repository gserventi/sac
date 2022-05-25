<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="{{ url('/home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Transporte TDM" style="height: 56px"/>
                    <strong>Transporte TDM</strong>
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-shopping-bag"></i>Compras <i class="fas fa-caret-down"></i></a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="{{route('compra.index')}}">Compras</a>
                        </li>
                        <li>
                            <a href="{{route('pago.index')}}">Pagos</a>
                        </li>
                        <li>
                            <a href="{{route('proveedor.index')}}">Proveedores</a>
                        </li>
                        <li>
                            <a href="{{route('rubro.index')}}">Rubros</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-shopping-cart"></i>Ventas <i class="fas fa-caret-down"></i></a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="{{route('cliente.index')}}">Clientes</a>
                        </li>
                        <li>
                            <a href="#">Cobros</a>
                        </li>
                        <li>
                            <a href="{{route('venta.index')}}">Ventas</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-copy"></i>Listados</a>
                </li>
                @if(Auth::user()->is_admin)
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-gear"></i>Configuracion <i class="fas fa-caret-down"></i></a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="{{route('formaDePago.index')}}">Formas de pago</a>
                        </li>
                        <li>
                            <a href="{{route('periodo.index')}}">Periodos</a>
                        </li>
                        <li>
                            <a href="{{route('porcentajeIVA.index')}}">Porcentajes de IVA</a>
                        </li>
                        <li>
                            <a href="{{route('puntoDeVenta.index')}}">Puntos de venta</a>
                        </li>
                        <li>
                            <a href="{{route('tipoDeComprobante.index')}}">Tipos de comprobantes</a>
                        </li>
                        <li>
                            <a href="#">Usuarios</a>
                        </li>
                    </ul>
                </li>
                @endif
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        <i class="zmdi zmdi-power"></i>{{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->

<!-- PAGE CONTAINER-->
<div class="page-container">
    <!-- HEADER DESKTOP-->
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    {{--<form class="form-header" action="" method="POST">
                        <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                        <button class="au-btn--submit" type="submit">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </form>--}}
                    <div class="header-button" style="margin-left: auto;">
                        <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu">
                                <div class="content">
                                    <a class="js-acc-btn" href="#">{{ Auth::user()->name }}</a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="content" style="margin-left: 0px">
                                            <h5 class="name">
                                                <a href="#">{{ Auth::user()->name }}</a>
                                            </h5>
                                            <span class="email">{{ Auth::user()->email }}</span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="zmdi zmdi-power"></i>{{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER DESKTOP-->
</div>
