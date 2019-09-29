@extends('home.header')

@section('content')
    <br><br><br>
    <div class="col-md-8 col-xs-12">
        <h1>Edit Account</h1>
        <br>

        <div class="col-sm-3">
            <img src="{{isset($user->file) ? asset($user->file) : ""}}" alt="" class="img-responsive img-rounded">
        </div>

        <div class="col-sm-9">

            @if(session()->has('success'))
                <div class="alert alert-success">
                    <p>{{session()->pull('success')}}</p>
                </div>
            @endif

            @include('errors.error')

            {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AccountController@update', $user->id], 'files'=>'true']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('repeat_password', 'Repeat Password:') !!}
                {!! Form::password('repeat_password', ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('file', 'File:') !!}
                {!! Form::file('file') !!}
            </div>

            <div class="form-group">

                {!! Form::submit('Edit User', ['class'=>'btn btn-primary']) !!}
            </div>


            {!! Form::close() !!}
        </div>
    </div>
@endsection
