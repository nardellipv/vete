<div class="sidebar sidebar-main sidebar-default">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user-material">
            <div class="category-content">
                <div class="sidebar-user-material-content">
                    <a href="#"><img src="{{ asset('styleAdmin/assets/images/placeholder.jpg') }}" class="img-circle img-responsive" alt=""></a>
                    <h6>Victoria Baker</h6>
                    <span class="text-size-small">Santa Ana, CA</span>
                </div>

                {{--<div class="sidebar-user-material-menu">
                    <a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
                </div>--}}
            </div>

            {{--<div class="navigation-wrapper collapse" id="user-nav">
                <ul class="navigation">
                    <li><a href="#"><i class="icon-user-plus"></i> <span>My profile</span></a></li>
                    <li><a href="#"><i class="icon-coins"></i> <span>My balance</span></a></li>
                    <li><a href="#"><i class="icon-comment-discussion"></i> <span><span class="badge bg-teal-400 pull-right">58</span> Messages</span></a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-cog5"></i> <span>Account settings</span></a></li>
                    <li><a href="#"><i class="icon-switch2"></i> <span>Logout</span></a></li>
                </ul>
            </div>--}}
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header"><span>Menú</span> <i class="icon-menu" title="Main pages"></i></li>
                    <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ route('home') }}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                    <li class="{{ request()->is('clientes') ? 'active' : '' }}"><a href="{{ route('customer.index') }}"><i class="icon-user"></i> <span>Clientes</span></a></li>
                    <li class="{{ request()->is('pacientes') ? 'active' : '' }}"><a href="{{ route('patient.index') }}"><i class="icon-nbsp"></i> <span>Macotas</span></a></li>
                    <li class="{{ request()->is('turnos') ? 'active' : '' }}"><a href="{{ route('turn.index') }}"><i class="icon-calendar"></i> <span>Turnos</span></a></li>
                    <li class="{{ request()->is('ventas') ? 'active' : '' }}"><a href="{{ route('sale.index') }}"><i class="icon-store"></i> <span>Ventas</span></a></li>
                    <li class="{{ request()->is('inventario') ? 'active' : '' }}"><a href="{{ route('stock.index') }}"><i class="icon-color-sampler"></i> <span>Inventario</span></a></li>
                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>