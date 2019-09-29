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
                          </tr>
                    @endforeach
                    </tbody>
            @endif
        </table>
    </div>

    <div class="col-sm-6">
            <h1>Create</h1>

            @include('errors.error')

            {!! Form::open(['method'=>'POST', 'action'=>'CategoryController@store']) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
                    </div>

            {!! Form::close() !!}
    </div>
@endsection
