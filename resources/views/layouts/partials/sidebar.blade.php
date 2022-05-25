<!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="{{ url('/home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Transporte TDM" style="height: 56px"/>
                    <strong>Transporte TDM</strong>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-shopping-bag"></i>Compras <i class="fas fa-caret-down"></i></a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
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
                        <li>
                            <a class="js-arrow" href="#">
                                <i class="fas fa-shopping-cart"></i>Ventas <i class="fas fa-caret-down"></i></a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
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
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
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
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
