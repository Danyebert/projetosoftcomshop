<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="url-base" content="{{ url('') }}">

    <title>{{ config('app.name', 'Controle de Estoque') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- CSS -->
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">

    <style>
        .content-wrapper {
            background-color: #f4f6f9;
        }

        .brand-link {
            text-align: center;
        }

        .brand-text {
            font-weight: 600;
        }

        .main-sidebar {
            background-color: #2f4050;
            /* azul clarinho */
        }

        .brand-link {
            background-color: #2f4050;
            color: #fff;
        }

        .nav-sidebar .nav-link {
            color: #eaf2ff;
        }

        .nav-sidebar .nav-link.active {
            background-color: #2f4050;
            color: #fff;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/home') }}" class="nav-link">Início</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-user-circle"></i>
                        <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="user-header bg-primary">
                            <p>
                                {{ Auth::user()->name }} <br>
                                <small>{{ Auth::user()->email }}</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <a href="{{ route('logout') }}"
                                class="btn btn-default btn-flat float-right"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Sair
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{ url('/home') }}" class="brand-link">
                <span class="brand-text">Controle de Estoque</span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column"
                        data-widget="treeview"
                        role="menu"
                        data-accordion="false">
                        <li class="nav-header">MENU</li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-folder"></i>
                                <p>
                                    Cadastros
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('produtos') }}" class="nav-link">
                                        <i class="fas fa-box-open"></i>
                                        <p>Produtos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('categorias') }}" class="nav-link">
                                        <i class="fas fa-plus"></i>
                                        <p>Grupos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('marcas') }}" class="nav-link">
                                        <i class="fas fa-plus"></i>
                                        <p>Fabricantes</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('fornecedores') }}" class="nav-link">
                                        <i class="fas fa-user-plus"></i>
                                        <p>Fornecedores</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">MOVIMENTAÇÕES</li>
                        <li class="nav-item">
                            <a href="{{ url('movimentacao') }}" class="nav-link">
                                <i class="nav-icon fas fa-random"></i>
                                <p>Entradas / Saídas</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
            <section class="content pt-4 px-4">
                @yield('content')
            </section>
        </div>
    </div>

    <!-- JS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        const urlBase = document.querySelector('meta[name="url-base"]').content;
    </script>

    @stack('js')
    {!! Toastr::message() !!}
</body>

</html>