@extends('admin.header')

@section('content')

    <div class="col-sm-12" style="display: inline-block">

        <h1>Deleted Products</h1>

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
                <th>Created By</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Delete</th>
                <th>Restore</th>
            </tr>
            </thead>
            @if($products)
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->title}}</td>
                        <td>{{isset($product->brand->name) ? $product->brand->name : "Deleted"}}</td>
                        <td>{{isset($product->category->name) ? $product->category->name : "Deleted"}}</td>
                        <td>{{$product->price}}</td>
                        <td><img src="{{($product->file) ? asset($product->file) : ""}}" alt="" height="40" width="40"></td>
                        <td>{{$product->quantity}}</td>
                        <td>{{str_limit($product->description, 10)}}</td>
                        <td>{{isset($product->user->name) ? $product->user->name : "Deleted"}}</td>
                        <td>{{$product->created_at->diffForHumans()}}</td>
                        <td>{{$product->updated_at->diffForHumans()}}</td>
                        <td><a href="{{route('product.permanent', $product->id)}}"><button class="btn btn-danger">Delete</button></a></td>
                        <td><a href="{{route('product.restore', $product->id)}}"><button class="btn btn-primary">Restore</button></a></td>
                    </tr>
                @endforeach
                </tbody>
            @endif
        </table>
    </div>
@endsection
