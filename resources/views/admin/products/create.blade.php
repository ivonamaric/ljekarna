@extends('admin.header')

@section('content')
        <h1>Create Product</h1>

            @include('errors.error')

            {!! Form::open(['method'=>'POST', 'action'=>'ProductController@store', 'files' => true]) !!}

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
                        {!! Form::select('category_id', ['' => 'Choose category'] + $categories, null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('brand_id', 'Brand:') !!}
                        {!! Form::select('brand_id', ['' => 'Choose brand'] + $brands, null, ['class'=>'form-control']) !!}
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
                        {!! Form::submit('Create Product', ['class'=>'btn btn-primary']) !!}
                    </div>

                {!! Form::close() !!}

@endsection
