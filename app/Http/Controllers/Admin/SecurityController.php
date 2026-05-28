<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SecurityController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();
        $admins = User::role('admin')->active()->get();

        return view('admin.security.index', compact('roles', 'permissions', 'admins'));
    }

    public function updateRole(Request $request, Role $role)
    {
        $role->syncPermissions($request->permissions ?? []);
        return back()->with('success', 'Role permissions updated.');
    }

    public function createRole(Request $request)
    {
        $role = Role::create(['name' => $request->name, 'guard_name' => 'web']);
        return back()->with('success', "Role '{$role->name}' created.");
    }

    public function logs()
    {
        $logs = \App\Models\ActivityLog::with('user')->latest()->paginate(50);
        return view('admin.security.logs', compact('logs'));
    }
}
