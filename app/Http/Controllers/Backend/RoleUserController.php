<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\RoleUserStoreRequest;
use App\Http\Requests\Backend\RoleUserUpdateRequest;
use App\Mail\RoleUserCreateMail;
use App\Models\Admin;
use Illuminate\Support\Facades\Mail;

use Spatie\Permission\Models\Role;


class RoleUserController extends Controller
{
    // permissions management
    public function __construct()
    {
        $this->middleware('role_or_permission:access management index,admin')->only('index');
        $this->middleware('role_or_permission:access management create,admin')->only('create', 'store');
        $this->middleware('role_or_permission:access management edit,admin')->only('edit', 'update');
        $this->middleware('role_or_permission:access management delete,admin')->only('destroy');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::simplePaginate(5);

        return view('backend.role-users.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();

        return view('backend.role-users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleUserStoreRequest $request)
    {
        try {

            // just chose to try using instance method style here lolz
            $user = new Admin();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

            // assigns the role to user
            $user->assignRole($request->role);

            /** send mail to the new role user */
            Mail::to($request->email)->send(new RoleUserCreateMail($request->email, $request->password));

            toast('User & Role Created Successfully!','success')->width('350');

            return redirect()->route('admin.role-user.index');

        } catch (\Throwable $th) {
            throw $th;
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Admin::findOrFail($id);
        $roles = Role::all();

        return view('backend.role-users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleUserUpdateRequest $request, string $id)
    {
        // only when admin wants to also edit user password, then this will validate
        if($request->has('password') && !empty($request->password)){
            $request->validate(['password' => ['confirmed', 'min:6']]);
        }

        $user = Admin::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->has('password') && !empty($request->password)){
            $user->password = bcrypt($request->password);
        }

        // blocks other users from accessing Super Admin's update functionality via url
        if($user->name === 'Super Admin'){

            toast('You are unauthorized!','success')->width('300');

            return redirect()->route('admin.role-user.index');
        }

        $user->save();

        // assigns the role to user
        $user->syncRoles($request->role);

        toast('Updated Successfully!','success')->width('300');

        return redirect()->route('admin.role-user.index');
    }

    // Remove the specified resource from storage.

    public function destroy(string $id)
    {
        try{

            $user = Admin::findOrFail($id);

            if ($user->getRoleNames()->first() === 'Super Admin'){
                return response(['status' => 'error', 'message' => __('Can\'t Delete This One!')]);
            }

            $user->delete();
            return response(['status' => 'success', 'message' => __('Deleted Successfully!')]);

        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => __('Something went wrong!')]);
        }
    }
}
