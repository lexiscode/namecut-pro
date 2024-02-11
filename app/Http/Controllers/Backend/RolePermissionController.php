<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    /* permissions management
    public function __construct()
    {
        $this->middleware('role_or_permission:access management index,admin')->only('index');
        $this->middleware('role_or_permission:access management create,admin')->only('create', 'store');
        $this->middleware('role_or_permission:access management edit,admin')->only('edit', 'update');
        $this->middleware('role_or_permission:access management delete,admin')->only('destroy');
    }
    */

    public function index()
    {
        $roles = Role::simplePaginate(5);

        return view('backend.roles.index', compact('roles'));
    }


    public function create()
    {
        $permissions = Permission::all()->groupBy('group_name');
        $roles = Role::all();

        return view('backend.roles.create', compact('permissions', 'roles'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'role' => ['required', 'max:50', 'unique:permissions,name']
        ]);

        // Create a role dynamically for users authenticating with the admin guard:
        $role = Role::create(['guard_name' => 'admin', 'name' => $request->role]);

        // Assign multiple permissions to the role
        $role->syncPermissions($request->permissions); // from the permissions[] name

        toast('Created Successfully!','success')->width('300');

        return redirect()->route('admin.role.index');
    }

    public function edit(string $id)
    {
        $permissions = Permission::all()->groupBy('group_name');

        $role = Role::findOrFail($id);

        $rolePermissions = $role->permissions;
        $rolePermissions = $rolePermissions->pluck('name')->toArray();

        return view('backend.roles.edit', compact('permissions', 'role', 'rolePermissions'));

    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'role' => ['required', 'max:50', 'unique:permissions,name']
        ]);

        // Create a role dynamically for users authenticating with the admin guard:
        $role = Role::findOrFail($id);

        // blocks other users from accessing Super Admin's update functionality via url
        if($role->name === 'Super Admin'){

            toast('You are unauthorized!','success')->width('350');
            return redirect()->route('admin.role.index');
        }

        $role->update(['guard_name' => 'admin', 'name' => $request->role]);

        // Assign multiple permissions to the role
        $role->syncPermissions($request->permissions); // from the permissions[] name

        toast('Updated Successfully!','success')->width('300');
        return redirect()->route('admin.role.index');
    }

    public function destroy(string $id)
    {
        try{

            $role = Role::findOrFail($id);

            // blocks other users from accessing Super Admin's delete functionality via url
            if ($role->name === 'Super Admin'){
                return response(['status' => 'error', 'message' => __('Can\'t Delete This One!')]);
            }

            $role->delete();
            return response(['status' => 'success', 'message' => __('Deleted Successfully!')]);

        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => __('Something went wrong!')]);
        }
    }
}
