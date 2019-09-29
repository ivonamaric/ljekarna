@extends('home.header')

@section('content')
    <br><br><br>
    <div class="col-md-8 col-xs-12">
        <h1>Details</h1>
        <br>

        <div class="col-sm-3">
            <img src="{{isset($product->file) ? asset($product->file) : ""}}" alt="" class="img-responsive img-rounded">
        </div>
        <div class="col-sm-9">


            {!! Form::model($product, ['method'=>'PATCH']) !!}

            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class'=>'form-control','readonly']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('price', 'Price:') !!}
                {!! Form::text('price', null, ['class'=>'form-control', 'readonly']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', null, ['class'=>'form-control', 'readonly']) !!}
            </div>


            {!! Form::close() !!}
        </div>
    </div>
@endsection
