@extends('admin.header')

@section('content')
    <h1>Edit Product</h1>

    @include('errors.error')

    <div class="col-sm-3">
        <img src="{{isset($product->file) ? asset($product->file) : ""}}" alt="" class="img-responsive img-rounded">
    </div>


    <div class="col-sm-9">
    {!! Form::model($product, ['method'=>'PATCH', 'action'=>['ProductController@update', $product->id], 'files' => true]) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('price', 'Price:') !!}
        {!! Form::text('price', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('quantity', 'Quantity:') !!}
        {!! Form::text('quantity', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id', 'Category:') !!}
        {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('brand_id', 'Brand:') !!}
        {!! Form::select('brand_id', $brands, null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('file', 'File:') !!}
        {!! Form::file('file') !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Edit Product', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
    </div>
@endsection
