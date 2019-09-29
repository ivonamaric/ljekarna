@extends('admin.header')

@section('content')

    <h1>Deleted Users</h1>

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
            <th>Restore</th>
        </tr>
        </thead>
        @if($users)
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                    <td><img src="{{($user->file) ? asset($user->file) : ""}}" alt="" height="40" width="40"></td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                    <td><a href="{{route('user.permanent', $user->id)}}"><button class="btn btn-danger">Delete</button></a></td>
                    <td><a href="{{route('user.restore', $user->id)}}"><button class="btn btn-primary">Restore</button></a></td>
                </tr>
            @endforeach
            </tbody>
        @endif
    </table>
@endsection
