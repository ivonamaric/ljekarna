<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
        $user = User::find($id);

        return view('home.account', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validation
        $this->validate($request, array(
            'name' => 'required|alpha|max:191|min:2',
            'email' => 'required|email|unique:users,email,' . $id . '|max:191',
            'password' => 'sometimes|nullable|max:191|min:6',
            'repeat_password' => 'sometimes|same:password',
            'file' => 'image|max:5000',
        ));

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

        $update = $user->update($input);

        if ($update) {
            session()->put('success', 'Profile edited.');
        }

        return redirect()->route('account.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
