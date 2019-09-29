@extends('home.header')

@section('content')
    <p><br/></p>
    <p><br/></p>
    <p><br/></p>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-2 col-xs-12">
            <div class="nav nav-pills nav-stacked">

                <li class="active"><a href="#"><h4>Categories</h4></a></li>

                @if($categories)
                    @foreach($categories as $category)

                         <li><a href="{{route('category', $category->id)}}">{{$category->name}}</a></li>

                    @endforeach
                @endif
            </div>

            <div class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><h4>Brands</h4></a></li>

                @if($brands)
                    @foreach($brands as $brand)

                        <li><a href="{{route('brand', $brand->id)}}">{{$brand->name}}</a></li>

                    @endforeach
                @endif

            </div>
        </div>

        <div class="col-md-8 col-xs-12">

            @if(session()->has('success'))
                <div class="alert alert-success">
                    <p>{{session()->pull('success')}}</p>
                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger">
                    <p>{{session()->pull('error')}}</p>
                </div>
            @endif
            <div class="panel panel-info">
                <div class="panel-heading">Products</div>
                <div class="panel-body">
                    @if($products)
                        @foreach($products as $product)
                            <div class="col-md-4">
                                <div class="panel panel-info">
                                    <div class="panel-heading">{{$product->title}}</div>
                                    <div class="panel-body">

                                        <img src="{{asset($product->file)}}" height="160" width="160"/>
                                    </div>
                                    <div class="panel-heading">{{$product->price}} KM
                                        <a href="{{route('add_cart', $product->id)}}"><button style="float:right;" class="btn btn-danger btn-xs">AddToCart</button></a>
                                        <a href="{{route('details', $product->id)}}"><button style="float:right;" class="btn btn-success btn-xs">Details</button></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="panel-footer">&copy; 2019</div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
    @endsection
