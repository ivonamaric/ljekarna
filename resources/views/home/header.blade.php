<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ljekarna</title>
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}"/>
    <style>
        @media screen and (max-width:480px){
            #search{width:80%;}
            #search_btn{width:30%;float:right;margin-top:-32px;margin-right:10px;}
        }
    </style>

</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
                <span class="sr-only">navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">Ljekarna</a>
        </div>
            <div class="collapse navbar-collapse" id="collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{route('home')}}"><span></span>Home</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if(isset(Auth::user()->name))
                        <li><a href="{{route('transaction')}}" class="nav-link">Transactions</a></li>
                        <li><a href="{{route('cart')}}" class="nav-link">Cart</a></li>
                        <li><a href="{{route('account.edit', Auth::user()->id)}}" class="nav-link">Account</a></li>
                        @if(Auth::user()->role->name == 'admin' || Auth::user()->role->name == 'moderator')
                            <li><a href="{{route('admin')}}" class="nav-link">Administration</a></li>
                        @endif
                    @endif
                    @guest
                        <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
    </div>
</div>
    @yield('content')

<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
