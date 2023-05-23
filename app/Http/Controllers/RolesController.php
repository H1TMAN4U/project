<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        $roles=Role::all();
        $permissions = Permission::all();
        return view('access.admin.roles.index',
        compact('roles','permissions'));
    }
    public function create()
    {
        return view('access.admin.roles.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        Role::create($validated);
        return to_route('admin.roles.index')->with('message', 'Role Created successfully.');
    }
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('access.admin.roles.edit', compact('role', 'permissions'));
    }
    public function update(Request $request, Role $role)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        $role->update($validated);
        return to_route('admin.roles.index')->with('message', 'Role Updated successfully.');
    }
    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('message', 'Role deleted.');
    }
    public function givePermission(Request $request, Role $role)
    {
        if($role->hasPermissionTo($request->permission)){
            return back()->with('message', 'Permission exists.');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('message', 'Permission added.');
    }
    public function revokePermission(Role $role, Permission $permission)
    {
        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked.');
        }
        return back()->with('message', 'Permission not exists.');
    }
}
