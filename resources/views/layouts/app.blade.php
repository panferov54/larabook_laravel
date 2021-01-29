<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Larabook</title>

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>


    <div id="app">
        <nav class="navbar">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#app-navbar-collapse">
                      открыть меню
                    </button>


                </div>

                <div class="collapse navbar-collapse bg-light"  id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->

                        &nbsp;@section('menu')

                                <ul class="nav nav-justified ">
                                    <li class="nav-item">
                                        <a href="{{url('topic')}}" class="nav-link">Main Page</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{url('block/create')}}" class="nav-link">Content control</a>
                                    </li>



                        @show


                    <!-- Right Side Of Navbar -->

                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="nav-item mr-3"><a href="{{ url('/login') }}" class="nav-link">Login</a></li>
                            <li class="nav-item mr-3"><a href="{{ url('/register') }}" class="nav-link">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
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

        <div class="container">
            <div class="row">
                @yield('content')

            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>


</body>
</html>
