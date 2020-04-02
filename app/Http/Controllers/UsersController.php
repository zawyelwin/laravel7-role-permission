<?php

namespace App\Http\Controllers;

use Auth;
use App\Role;
use App\User;
use App\Traits\Authorizable;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;


class UsersController extends Controller
{
    use Authorizable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('admin.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $user->syncRoles($request->role);
        return redirect('/admin/users')->with('success','Successfully created user');
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
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        $this->validate($request, [
            'name'      => 'bail|required|min:2',
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'role'      => 'required|min:1',
            'password'  => 'nullable|confirmed|min:6',
        ]);

        $user->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password)
        ]);

        if ($request->role) {
            $user->syncRoles($request->role);
        }
        return redirect('/admin/users')->with('success' , 'Successfully updated user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Auth::id() != $user->id){
            $user->delete();
            return 'success';
        }

        return response(["message" => "You Cannot Delete Yourself!"],401);
    }
}
