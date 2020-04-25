<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <meta name="Description" content="HTML5 Bootstrap Admin Template" />
    <meta name="author" content="Spruko Technologies Private Limited" />
    <meta name="keywords"
        content="dashboard template,admin template,bootstrap dashboard,crypto dashboard,cryptocurrency dashboard,cryptocurrency website template,bitcoin template,bootstrap admin template,ico website template,admin dashboard template,admin panel template,bootstrap 4 admin template,dashboard html,html admin template,simple bootstrap template,template admin bootstrap 4,admin dashboard template bootstrap" />
    {{-- FAVICON --}}
    <link rel="icon" href="{{asset('/img/favicon.ico')}}" type="image/x-icon" />
    {{-- TITULO WEB --}}
    <title>{{config('app.name')}}</title>
    {{-- FONT AWESOME CSS --}}
    <link href="{{asset('/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet" />
    {{-- BOOTSTRAP CSS--}}
    <link href="{{asset('/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    {{-- TYPICONS CSS--}}
    <link href="{{asset('/plugins/typicons.font/typicons.css')}}" rel="stylesheet" />
    {{-- SIDEBAR CSS --}}
    <link href="{{asset('/plugins/sidebar/sidebar.css')}}" rel="stylesheet" />
    {{-- HORIZONTAL MENU CSS --}}
    <link id="switcher" href="{{asset('/plugins/horizontal-menu/horizontal-menu.css')}}" rel="stylesheet" />
    {{-- CUSTOM SCROLL BAR CSS --}}
    <link href="{{asset('/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet" />
    {{-- PRIMSM CSS --}}
    <link href="{{asset('/plugins/prism/prism.css')}}" rel="stylesheet" />
    {{-- SYTLES CSS --}}
    <link href="{{asset('/css/dashboard-four.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/dashboard-four-dark.css')}}" rel="stylesheet" />
    {{-- ICON STYLE --}}
    <link href="{{asset('/css/icons.css')}}" rel="stylesheet" />
    {{-- ALERTAS NOTIFIT --}}
    <link href="{{ asset('/css/notifIt.css') }}" rel="stylesheet">
    {{--CSS PERSONALES--}}
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
    <livewire:styles>
</head>

<body class="main-body">
    <!-- Loader -->
    <div id="loading">
        <img src="{{asset(('img/loader4.svg'))}}" class="loader-img" alt="Loader" />
    </div>

    <!-- main-header -->
    <div class="header-main hor-header">
        <div class="main-header">
            <div class="container">
                <!--logo-->
                <div class="hor-logo">
                    <a class="main-logo desktop-logo tx-white"
                        href="{{route('escritorio.index')}}">{{ config('app.name') }}</a>
                    <a class="main-logo mobile-logo tx-white"
                        href="{{route('escritorio.index')}}">{{ config('app.name') }}</a>
                </div>
                <!--/logo-->
                <a class="animated-arrow hor-toggle horizontal-navtoggle"><span></span></a>
                <div class="main-header-right ml-auto">
                    <div class="main-header-fullscreen fullscreen-button">
                        <a href="#" class="header-link">
                            <i class="header-icons" data-eva="expand-outline"></i>
                        </a>
                    </div>
                    {{-- <div class="dropdown main-header-notification d-none d-md-flex">
                        <a class="new header-link" href="">
                            <i class="header-icons" data-eva="bell-outline"></i>
                            <span class="pulse bg-danger"></span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="p-3 border-bottom text-center">
                                <h6 class="main-notification-title">Notificaciones</h6>
                            </div>
                            <div class="main-notification-list">
                                <a href="#" class="dropdown-item d-flex">
                                    <div class="text-primary tx-18 mr-3">
                                        <i class="fe fe-mail"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Commented on your post.</h6>
                                        <div class="small text-muted">3 hours ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item d-flex border-top">
                                    <div class="text-pink tx-18 mr-3">
                                        <i class="fe fe-user"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">New User Registered</h6>
                                        <div class="small text-muted">1 day ago</div>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer">
                                <a href="">Ver todas las notificaciones</a>
                            </div>
                        </div>
                    </div> --}}
                    <div class="dropdown main-profile-menu">
                        <a class="main-img-user" href="">
                            <img alt="" src="{{asset('images/avatar')}}/{{Auth::user()->avatar}}" />
                        </a>
                        <div class="dropdown-menu">
                            <div class="main-header-profile">
                                <h6>{{ Auth::user()->nombres }}</h6>
                                <span>{{Auth::user()->roles->pluck('nombre_rol') }}</span>
                            </div>
                            <a class="dropdown-item" href="#"><i class="si si-user"></i> Perfil</a>
                            <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="si si-power"></i> Salir</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/main-header-->

    <!--Horizontal-main -->
    <div class="sticky">
        <div class="horizontal-main hor-menu clearfix">
            <div class="horizontal-mainwrapper container clearfix">
                <!--Nav-->
                <nav class="horizontalMenu clearfix">
                    <ul class="horizontalMenu-list">
                        <li aria-haspopup="true">
                            <a href="{{route('escritorio.index')}}" class="sub-icon"><i class="hor-icon"
                                    data-eva="monitor-outline"></i>
                                Escritorio</a>
                        </li>
                        <li aria-haspopup="true">
                            <a href="#" class="sub-icon"><i class="hor-icon" data-eva="cube-outline"></i> Ciclos
                                <i class="fe fe-chevron-down horizontal-icon"></i></a>
                            <ul class="sub-menu">
                                <li aria-haspopup="true">
                                    <a href="{{route('ciclo.index')}}">Lista de Ciclos</a>
                                </li>
                            </ul>
                        </li>
                        <li aria-haspopup="true">
                            <a href="#" class="sub-icon"><i class="hor-icon" data-eva="cube-outline"></i> Programas
                                <i class="fe fe-chevron-down horizontal-icon"></i></a>
                            <ul class="sub-menu">
                                <li aria-haspopup="true">
                                    <a href="{{route('programa.index')}}">Lista de Programas</a>
                                </li>
                                <li aria-haspopup="true">
                                    <a target="_blank" href="#">Reporte Programas</a>
                                </li>
                            </ul>
                        </li>
                        <li aria-haspopup="true">
                            <a href="#" class="sub-icon"><i class="hor-icon" data-eva="cube-outline"></i> Cursos
                                <i class="fe fe-chevron-down horizontal-icon"></i></a>
                            <ul class="sub-menu">
                                <li aria-haspopup="true">
                                    <a href="{{route('ncurso.index')}}">Cursos Asignados</a>
                                </li>
                                <li aria-haspopup="true">
                                    <a href="{{route('curso.index')}}">Cursos Usuarios</a>
                                </li>
                                <li aria-haspopup="true"><a href="{{route('curso.create')}}">Asignar
                                        Curso Usuario</a></li>
                                <li aria-haspopup="true">
                                    <a target="_blank" href="#">Reporte Cursos</a>
                                </li>
                            </ul>
                        </li>
                        <li aria-haspopup="true">
                            <a href="#" class="sub-icon"><i class="hor-icon" data-eva="cube-outline"></i> Material
                                <i class="fe fe-chevron-down horizontal-icon"></i></a>
                            <ul class="sub-menu">
                                <li aria-haspopup="true">
                                    <a href="{{route('material.index')}}">Lista Material</a>
                                </li>
                            </ul>
                        </li>
                        <li aria-haspopup="true">
                            <a href="#" class="sub-icon"><i class="hor-icon" data-eva="cube-outline"></i> Notas
                                <i class="fe fe-chevron-down horizontal-icon"></i></a>
                            <ul class="sub-menu">
                                <li aria-haspopup="true">
                                    <a href="{{route('nota.index')}}">Lista de Notas</a>
                                </li>
                                <li aria-haspopup="true">
                                    <a target="_blank" href="#">Reporte Notas</a>
                                </li>
                        </li>
                    </ul>
                    </li>
                    <li aria-haspopup="true">
                        <a href="#" class="sub-icon"><i class="hor-icon" data-eva="cube-outline"></i> Usuarios
                            <i class="fe fe-chevron-down horizontal-icon"></i></a>
                        <ul class="sub-menu">
                            <li aria-haspopup="true">
                                <a href="{{route('administrador.index')}}">Lista de Usuarios</a>
                            </li>
                            <li aria-haspopup="true">
                                <a href="{{route('usuario.docentes')}}">Lista de Docentes</a>
                            </li>
                            <li aria-haspopup="true">
                                <a href="{{route('usuario.alumnos')}}">Lista de Alumnos</a>
                            </li>
                            <li aria-haspopup="true">
                                <a target="_blank" href="{{route('pdf.usuarios')}}">Reporte Usuarios</a>
                            </li>
                        </ul>
                    </li>
                    </ul>
                </nav>
                <!--Nav-->
            </div>
        </div>
    </div>
    <!--Horizontal-main -->

    <!--Main Content-->
    <div class="main-content px-0 hor-content">
        <!--Main Content Container-->
        <div class="container">
            <div class="card p-4 mt-4 mb-4">
                @include('flash-message')
                @yield('content')
            </div>
        </div>
    </div>
    <!--Main Content-->

    <!--footer-->
    <div class="main-footer mg-t-auto">
        <div class="container-fluid">
            <span>Copyright &copy; {{ date('Y') }} <a href="#"></a>
                <a href="#">{{ config('app.name') }}</a> All rights
                reserved.</span>
        </div>
    </div>
    <!--/footer-->

    {{-- JQUERY JS --}}
    <script src="{{asset('/plugins/jquery/jquery.min.js')}}"></script>
    {{-- BOOSTRAP BUNDLE JS --}}
    <script src=" {{asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    {{-- EVA ICONS JS --}}
    <script src=" {{asset('/plugins/web-fonts/eva.min.js')}}"></script>
    {{-- SIDEBAR JS --}}
    <script src=" {{asset('/plugins/sidebar/sidebar.js')}}"></script>
    {{-- CUSTOM SCROLL BAR JS --}}
    <script src=" {{asset('/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    {{-- HORIZONTAL MENU JS --}}
    <script src="{{asset('/plugins/horizontal-menu/horizontal-menu.js')}}"></script>
    {{-- PERFECT SCROBALL JS --}}
    <script src="{{asset('/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    {{-- CLIPBOARD JS --}}
    <script src="{{asset('/plugins/clipboard/clipboard.min.js')}}"></script>
    <script src="{{asset('/plugins/clipboard/clipboard.js')}}"></script>
    {{-- PRISM JS --}}
    <script src="{{asset('/plugins/prism/prism.js')}}"></script>
    {{-- RIGHT SIDE JS --}}
    <script src="{{asset('/js/right-side.js')}}"></script>
    {{-- CUSTOM JS --}}
    <script src="{{asset('/js/custom.js')}}"></script>
    {{-- MOMENTS JS --}}
    <script src="{{asset('/js/moment.min.js')}}"></script>
    {{-- NOFIFIT JS --}}
    <script src="{{asset('/js/notifIt.js')}}"></script>
    <livewire:scripts>
        @stack('scripts')
        @yield('myscripts')
</body>

</html>