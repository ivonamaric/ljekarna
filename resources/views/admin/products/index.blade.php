@extends('admin.header')

@section('content')
    <h1>Products</h1>
    <br>

    <div class="col-sm-2" style="display: inline-block">
        <div class="nav nav-pills nav-stacked">

            <li class="active"><a href="#"><h4>Categories</h4></a></li>

            @if($categories)
                @foreach($categories as $category)

                    <li><a href="{{route('admin_category', $category->id)}}">{{$category->name}}</a></li>

                @endforeach
            @endif
        </div>


        <div class="nav nav-pills nav-stacked">
            <li class="active"><a href="#"><h4>Brands</h4></a></li>

            @if($brands)
                @foreach($brands as $brand)

                    <li><a href="{{route('admin_brand', $brand->id)}}">{{$brand->name}}</a></li>

                @endforeach
            @endif

        </div>
        </div>
    </div>

    <div class="col-sm-10" style="display: inline-block">
    <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Brand</th>
            <th>Category</th>
            <th>Price</th>
            <th>Image</th>
            <th>Quantity</th>
            <th>Description</th>
            @if(Auth::user()->role->name == 'admin')
                 <th>Created By</th>
            @endif
            <th>Created</th>
            <th>Updated</th>
            <th>Delete</th>
          </tr>
        </thead>
        @if($products)
            <tbody>
            @foreach($products as $product)
                  <tr>
                    <td>{{$product->id}}</td>
                    <td><a href="{{route('products.edit', $product->id)}}">{{$product->title}}</a></td>
                    <td>{{$product->brand->name}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>{{$product->price}}</td>
                    <td><img src="{{($product->file) ? asset($product->file) : ""}}" alt="" height="40" width="40"></td>
                    <td>{{$product->quantity}}</td>
                    <td>{{str_limit($product->description, 10)}}</td>
                      @if(Auth::user()->role->name == 'admin')
                            <td>{{isset($product->user->name) ? $product->user->name : "Deleted"}}</td>
                      @endif
                    <td>{{$product->created_at->diffForHumans()}}</td>
                    <td>{{$product->updated_at->diffForHumans()}}</td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['ProductController@destroy',$product->id]]) !!}

                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>

                        {!! Form::close() !!}
                    </td>
                  </tr>
            @endforeach
            </tbody>
        @endif
      </table>
    </div>
@endsection
