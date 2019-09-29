@extends('admin.header')

@section('content')
    <h1>Edit Category</h1>

    @include('errors.error')

    @if(session()->has('error'))
        <div class="alert alert-danger">
            <p>{{session()->pull('error')}}</p>
        </div>
    @endif

    {!! Form::model($category, ['method' => 'PATCH', 'action' => ['CategoryController@update', $category->id]]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <div class="col-sm-push-3">
                {!! Form::submit('Edit Category', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>


    {!! Form::close() !!}

    {!! Form::open(['method' => 'DELETE', 'action'=>['CategoryController@destroy', $category->id]]) !!}

        <div class="col-sm-push-3">
            {!! Form::submit('Delete Category', ['class' => 'btn btn-danger']) !!}
        </div>

    {!! Form::close() !!}
@endsection
