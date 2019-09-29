@extends('admin.header')

@section('content')
    <div class="col-sm-6">
        <h1>Deleted Brands</h1>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Delete</th>
                <th>Restore</th>
            </tr>
            </thead>
            @if($brands)
                <tbody>
                @foreach($brands as $brands)
                    <tr>
                        <td>{{$brands->id}}</td>
                        <td><a href="{{route('brands.edit', $brands->id)}}">{{$brands->name}}</a></td>
                        <td>{{$brands->created_at ? $brands->created_at->diffForHumans() : ""}}</td>
                        <td>{{$brands->updated_at ? $brands->updated_at->diffForHumans() : ""}}</td>
                        <td><a href="{{route('brand.permanent', $brands->id)}}"><button class="btn btn-danger">Delete</button></a></td>
                        <td><a href="{{route('brand.restore', $brands->id)}}"><button class="btn btn-primary">Restore</button></a></td>
                    </tr>
                @endforeach
                </tbody>
            @endif
        </table>
    </div>
@endsection
