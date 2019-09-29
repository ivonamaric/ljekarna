<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::pluck('name', 'id')->all();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('file')) {

            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->move('images/users', $filename);

            $input['file'] = $filename;
        } else {
            $input['file'] = "default-welcomer.png";
        }
        $input['password'] = bcrypt($request->password);

        User::create($input);

        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'id')->all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        //
        $user = User::findOrFail($id);

        $input = request()->all();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $file->move('images/users', $name);
            $oldFile = $user->getOriginal('file');

            if (($name != $oldFile) && (User::where('file', $oldFile)->where('id', '!=', $user->id)->count() == 0) && $oldFile != 'default-welcomer.png') {
                $oldFile = $user->file;
                unlink(public_path() . $oldFile);
            }

            $user->update(['file' => $name]);

            $input = request()->except(['file']);
        }

        if ($request->password == '') {

            $input['password'] = $user->password;

        } else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

        $user->update($input);

        return redirect()->route('users.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        User::find($id)->delete();

        return redirect()->route('users.index');
    }

    public function showDeletedUsers()
    {
        $users = User::onlyTrashed()->get();

        return view('admin.users.deleted', compact('users'));
    }

    public function deleteUserPermanent($id)
    {
        User::withTrashed()->find($id)->forceDelete();

        return redirect()->route('users.deleted');

    }

    public function restoreUser($id)
    {
        User::withTrashed()->find($id)->restore();

        return redirect()->route('users.deleted');

    }
}
