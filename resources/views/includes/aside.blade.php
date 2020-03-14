<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin-lte/index3.html" class="brand-link elevation-4">
        <img src="/admin-lte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/admin-lte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"> {{ Auth::user()->name }} </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-header">CITAS</li>
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-eye"></i>
                        <p>
                            Pacientes
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            @if (request()->path() == 'citas')
                                <a href="{{ route('citas.index') }}" class="nav-link active">
                            @else
                            <a href="{{ route('citas.index') }}" class="nav-link">
                                @endif
                                <i class="fa fa-book nav-icon"></i>
                                <p>Citas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            @if (request()->path() == 'horas')
                                <a href=" {{ route('horas.index') }} " class="nav-link active">
                            @else
                                <a href=" {{ route('horas.index') }} " class="nav-link">
                            @endif
                                <i class="far fa-clock nav-icon"></i>
                                <p>Horarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            @if (request()->path() == 'porciones')
                            <a href=" {{ route('porciones.index') }} " class="nav-link active">
                            @else
                            <a href=" {{ route('porciones.index') }} " class="nav-link">
                            @endif
                                <i class="fas fa-utensils nav-icon"></i>
                                <p>Porciones</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">CLIENTES</li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-comment"></i>
                        
                        <p>
                            Comentarios
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href=" {{ route('contactos.index') }} " class="nav-link">
                                {{-- <i class="far fa-circle nav-icon"></i> --}}
                                <i class="nav-icon fa fa-envelope"> </i>
                                <p>Comentarios</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-header">EXAMPLES</li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Layout Options
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">6</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../layout/top-nav.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Top Navigation</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-header">EXAMPLES</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Charts
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../charts/chartjs.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ChartJS</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            UI Elements
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../UI/general.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General</p>
                            </a>
                        </li>


                    </ul>
                </li>

                <li class="nav-header">EXAMPLES</li>

                <li class="nav-item">
                    <a href="../gallery.html" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Gallery
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>