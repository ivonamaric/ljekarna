@extends('admin.header')

@section('content')
    <div class="col-sm-6">
        <h1>Categories</h1>

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
            @if($categories)
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at ? $category->created_at->diffForHumans() : ""}}</td>
                        <td>{{$category->updated_at ? $category->updated_at->diffForHumans() : ""}}</td>
                        <td><a href="{{route('category.permanent', $category->id)}}"><button class="btn btn-danger">Delete</button></a></td>
                        <td><a href="{{route('category.restore', $category->id)}}"><button class="btn btn-primary">Restore</button></a></td>
                    </tr>
                @endforeach
                </tbody>
            @endif
        </table>
    </div>
@endsection
