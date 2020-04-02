<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use App\Traits\Authorizable;
use Illuminate\Http\Request;

class RolesController extends Controller
{

    use Authorizable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.role.index', compact('roles', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.role.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'       => 'required|string|unique:roles,name',
            'permission' => 'required|min:1'
        ]);

        $role = Role::create(['name' => $request->name ]);
        $role->syncPermissions($request->permission);
        return redirect('/admin/roles')->with('success','Successfully added role');
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
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.role.edit',compact('role','permissions'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:roles,name,'.$role->id,
            'permission' => 'required|min:1'
        ]);

        if($role->name === 'Admin') {
            $role->syncPermissions(Permission::all());
            return redirect('/admin/roles');
        }
        $permissions = $request->permission;
        $role->syncPermissions($permissions);
        return redirect('/admin/roles')->with('success','Successfully updated Role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if($role->id == 1){
            return response(["message" => "You Cannot Delete Admin Role!"],401);
        }
        $role->delete();
        return "success";
    }
}
