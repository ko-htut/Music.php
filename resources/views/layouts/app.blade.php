<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" style="height: 100%;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/bootstrap-cyborg.min.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> -->

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    @yield('styles')
</head>
<body style="height: 100%;" data-target=".scrollspy">
    <div id="app" style="position: relative; height: 100%;" class="scrollspy">
        <nav class="navbar navbar-default navbar-static-top navbar-fixed-top" style="height: 6vh;">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('settings.edit') }}"><span class="glyphicon glyphicon-home"></span> User Settings</a></li>
                                    <li>
                                        <a href="#" v-on:click="toggleAdmin()" v-cloak>
                                            <span class="glyphicon glyphicon-cog"></span>
                                            <span v-text="' ' + (admin ? 'Disable' : 'Enable') + ' Admin Mode'"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <span class="glyphicon glyphicon-log-out"></span> Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
