@extends('admin.header')

@section('content')
    <h1>Edit Brand</h1>

    @include('errors.error')

    @if(session()->has('error'))
        <div class="alert alert-danger">
            <p>{{session()->pull('error')}}</p>
        </div>
    @endif

    {!! Form::model($brand, ['method' => 'PATCH', 'action' => ['BrandController@update', $brand->id]]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        <div class="col-sm-push-3">
            {!! Form::submit('Edit Brand', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>


    {!! Form::close() !!}

    {!! Form::open(['method' => 'DELETE', 'action'=>['BrandController@destroy', $brand->id]]) !!}

    <div class="col-sm-push-3">
        {!! Form::submit('Delete Brand', ['class' => 'btn btn-danger']) !!}
    </div>

    {!! Form::close() !!}
@endsection
