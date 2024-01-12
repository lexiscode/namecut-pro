<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\AdminProfileUpdateRequest;
use App\Http\Requests\AdminPasswordUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // gets specific admin user login information
        $user = Auth::guard('admin')->user();

        return view('backend.profile.index', compact('user'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(AdminProfileUpdateRequest $request, string $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();

        toast('Updated Successfully!','success')->width('300');

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage for password.
     */
    public function passwordUpdate(AdminPasswordUpdateRequest $request, string $id)
    {

        $admin = Admin::findOrFail($id);
        $admin->password = bcrypt($request->password);
        $admin->save();

        toast('Updated Successfully!','success')->width('300');
        return redirect()->back();
    }
}
