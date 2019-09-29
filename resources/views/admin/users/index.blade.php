@extends('admin.header')

@section('content')

    <h1>Users</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Image</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Delete</th>
        </tr>
        </thead>
        @if($users)
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                    <td><img src="{{($user->file) ? asset($user->file) : ""}}" alt="" height="40" width="40"></td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                    <td>

                            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUserController@destroy',$user->id]]) !!}

                                    <div class="form-group">
                                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                    </div>

                            {!! Form::close() !!}

                    </td>
                </tr>
            @endforeach
            </tbody>
        @endif
    </table>
@endsection
