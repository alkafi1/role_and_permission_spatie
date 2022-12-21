<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Auth;
class RoleManager extends Controller
{
    //create Role
    function create_permission()
    {
        $users = Auth::user()->all();
        $permissions = Permission::all();
        $roles = Role::all();
        return view('RoleManager.create_permission',[
            'users' => $users,
            'permissions' => $permissions,
            'roles' => $roles,
        ]);
    }
    //permission store
    function permission_store(Request $request)
    {
        // $validated = $request->validate([
        //     'name' => 'required',
        // ]);
        Permission::create(['name' => $request->permission_name]);
        return back()->with('success', 'Permission Added Successfully.');
    }
    //role store
    function role_store(Request $request)
    {
        $validated = $request->validate([
            'role_name' => 'required',
            'permission_name' => 'required',
        ]);
        $role = Role::create(['name' => $request->role_name]);
        $role->givePermissionTo($request->permission_name);
        return back()->with('success', 'Role Added Successfully.');
        //return $request->all();
    }
    //assign role to user 
    function assign_role(Request $request)
    {
        $user = User::find($request->user_id);
        $user->assignRole($request->role_id);
        return back()->with('success', 'Assign Role To User Successfully.');
    }
    //role view
    function view_role()
    {
        $users = User::with('roles')->get();
        $role = Auth::user()->roles->pluck('name');
        return view('RoleManager.view_role',[
            'users' => $users,
            'role' => $role,
        ]);
    }
}
