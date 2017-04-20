<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>OLE</title>

    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /*Base Rules*/
        body{
            font-family: 'Raleway', sans-serif;
            background: url('/img/bg2.png');
        }
        a{color:#d35400;}
        /*Layout Rules*/
        #header a:hover{
            color:#d35400;
        }
        #main{
            margin-top:100px;
            min-height: 600px;
        }
        #footer{
            background: #111;
            height: 30px;
            position: relative; bottom: 0; width: 100%;
        }
        @yield('style')
    </style>

</head>
<body>
    <div id="app">
        <div id="header">
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <a class="navbar-brand" href="{{ route('teacher.home') }}">
                            <span class="glyphicon glyphicon-grain" aria-hidden="true">OLE</span>
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            <li><a href="{{route('teacher.home')}}">Home</a></li>
                            <li><a href="#">Lessons</a></li>
                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{ route('teacher.profile') }}">My Profile</a></li>
                            <!-- Authentication Links -->
                            @if (Auth::user())
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Logout
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
        </div>

        <div id="main">
            @yield('content')
        </div>

        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        &copy; 2017 OLE
                    </div>
                </div>
            </div><!--./row-->
        </div>

    </div><!--#app-->

    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script> @yield('script') </script>
</body>
</html>
