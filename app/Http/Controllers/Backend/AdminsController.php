<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AdminsUpdateRequest;
use App\Http\Requests\Backend\AdminsRegisterStoreRequest;

class AdminsController extends Controller
{

    /**
     * Displays the list of admins
     */
    public function index()
    {
        $admins = Admin::orderBy('created_at', 'desc')->simplePaginate(10);
        return view('backend.admins.index', compact('admins'));
    }

    /**
     * Displays the create page for adding new admins
     */
    public function create()
    {
        return view('backend.admins.create');
    }


    /**
     * Store user inputs into the database
     */
    public function store(AdminsRegisterStoreRequest $request)
    {
        $validatedData = $request->validated();

        // Create a new user using the validated data
        Admin::create($validatedData);

        toast('Created Successfully!','success')->width('300');

        // Adds a success message or redirect the user after successful registration
        return redirect()->route('admin.admins.index');
    }

    /**
     * Edit admin's resource.
     */
    public function edit(string $id)
    {
        // Retrieve the specific admin user from the database
        $admin = Admin::findOrFail($id);

        return view('backend.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminsUpdateRequest $request, string $id)
    {
        $admin = Admin::findOrFail($id);

        // Validated rules for the form fields
        $validatedData = $request->validated();

        $validatedData['password'] = bcrypt($request->password);

        // Update the Clients attributes
        $admin->update($validatedData);

        toast('Updated Successfully!','success')->width('300');

        return redirect()->route('admin.admins.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = Admin::findOrFail($id);

        $admin->delete();

        return response(['status' => 'success', 'message' => __('Deleted Successfully!')]);
    }
}
