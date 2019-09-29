<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->


    <title>Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
    <!-- aaa-->
</head>

<body style="padding-top: 80px;">

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('admin')}}">Admin Panel</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{route('home')}}">Home</a></li>
                @if(Auth::user()->role->name == 'admin')
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Users <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('users.create')}}">Add User</a></li>
                        <li><a href="{{route('users.index')}}">View Users</a></li>
                        <li><a href="{{route('users.deleted')}}">Deleted Users</a></li>
                    </ul>
                </li>
                @endif
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('products.create')}}">Add Product</a></li>
                        <li><a href="{{route('products.index')}}">View Products</a></li>
                        @if(Auth::user()->role->name == 'admin')
                        <li><a href="{{route('products.deleted')}}">Deleted Products</a></li>
                        @endif
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Category <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('categories.index')}}">Add Category</a></li>
                        @if(Auth::user()->role->name == 'admin')
                        <li><a href="{{route('categories.deleted')}}">Deleted Categories</a></li>
                        @endif
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Brand <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('brands.index')}}">Add Brand</a></li>
                        @if(Auth::user()->role->name == 'admin')
                        <li><a href="{{route('brands.deleted')}}">Deleted Brands</a></li>
                        @endif
                    </ul>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">

    <div class="row">
        <div>
            @yield('content')
        </div>
    </div>


<script src="{{ asset("js/app.js") }}"></script>
</body>
</html>
