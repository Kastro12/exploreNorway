<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Explore Norway</title>
    <link rel="icon" href="{{asset('images/snow.png')}}" type="image/gif" sizes="16x16">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('js/admincalendar.js')}}"></script>
    <script src="{{asset('js/app.js') }}"></script>
    <script src="{{asset('fancybox/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/style.css') }}" rel="stylesheet">
    <link href="{{asset('css/jquery-ui.css')}}" rel="stylesheet">

    <link href="{{asset('css/admin/css/sb-admin.css') }}" rel="stylesheet">
    <link href="{{asset('css/admin/css/admin.css') }}" rel="stylesheet">

    <link href="{{asset('fancybox/jquery.fancybox.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
        <a class="navbar-brand mr-1" href="{{route('admin')}}">Explore Norway</a>


        <!-- Navbar Search -->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

        </form>

        <!-- Navbar -->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="{{route('logout')}}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="sidebar navbar-nav">

            <li class="nav-item">
                <a class="nav-link" href="{{route('users')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Users</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('reservations')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Reservations</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('routes')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Routes</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('activities')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Activities</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('gallery')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Gallery</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('AdminImpressions')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Impressions</span></a>
            </li>
        </ul>

        <div id="content-wrapper">
            <div class="container-fluid">

                <!-- OVDE ISPISUJEM -->

                @yield('content')

            </div>
        </div>
    </div>
</div>

</body>
</html>
