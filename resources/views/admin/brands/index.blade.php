@extends('admin.header')

@section('content')


    <div class="col-sm-6">
        <h1>Brands</h1>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            @if($brands)
                <tbody>
                @foreach($brands as $brand)
                    <tr>
                        <td>{{$brand->id}}</td>
                        <td><a href="{{route('brands.edit', $brand->id)}}">{{$brand->name}}</a></td>
                        <td>{{$brand->created_at->diffForHumans()}}</td>
                        <td>{{$brand->updated_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
                </tbody>
            @endif
        </table>
    </div>

    <div class="col-sm-6">
        <h1>Create Brand</h1>

        @include('errors.error')

        {!! Form::open(['method'=>'POST', 'action'=>'BrandController@store']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Brand', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection
