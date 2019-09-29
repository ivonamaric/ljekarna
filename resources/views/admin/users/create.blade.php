@extends('admin.header')

@section('content')

    <h1>Create User</h1>

    @include('errors.error')

    {!! Form::open(['method'=>'POST', 'action'=>'AdminUserController@store', 'files' => true]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('role_id', 'Role:') !!}
            {!! Form::select('role_id', ['' => 'Choose Role'] + $roles, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('is_active', 'Status:') !!}
            {!! Form::select('is_active', ['' => 'Status', '0' => 'Not Active', '1' => 'Active'], null, ['class'=>'form-control']) !!}
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
            {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}
@endsection
