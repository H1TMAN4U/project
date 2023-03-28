<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Empty_;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('access.admin.users.index', compact('users'));
    }
    public function show(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('access.admin.users.role', compact('user', 'roles', 'permissions'));
    }
    public function assignRole(Request $request, User $user)
    {
        if ($user->hasRole($request->role)) {
            return back()->with('message', 'Role exists.');
        }
        $user->assignRole($request->role);
        return back()->with('message', 'Role assigned.');
    }
    public function removeRole(User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return back()->with('message', 'Role removed.');
        }
        return back()->with('message', 'Role not exists.');
    }
    public function givePermission(Request $request, User $user)
    {
        if ($user->hasPermissionTo($request->permission)) {
            return back()->with('message', 'Permission exists.');
        }
        $user->givePermissionTo($request->permission);
        return back()->with('message', 'Permission added.');
    }
    public function revokePermission(User $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked.');
        }
        return back()->with('message', 'Permission does not exists.');
    }
    public function destroy(User $user)
    {
        if ($user->hasRole('access.admin')) {
            return back()->with('message', 'you are admin.');
        }
        $user->delete();
        return back()->with('message', 'User deleted.');
    }
    // public function check()
    // {
    //     $id=Auth::user()->id;
    //     $user=User::find($id);
    //     // if($use ) if user  no roles gives user role -- wrong written kks ar model id
    //         $user->assignRole();
    //     return dd($user);

    // }
    public function dashboard(){
        $id=Auth::user()->id;
        $user=User::find($id);
        if($user->hasRole("Admin")){
            return redirect("/admin/index");
        }
        if($user->roles()->get()->count()==0){
            $user->assignRole("User");
        }
        return view("dashboard");
    }
}
