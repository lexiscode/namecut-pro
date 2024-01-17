<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\AdminProfileUpdateRequest;
use App\Http\Requests\AdminPasswordUpdateRequest;
use App\Http\Requests\Backend\ClientProfileUpdateRequest;
use App\Http\Requests\Backend\ClientPasswordUpdateRequest;

class ClientProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // gets specific admin user login information
        $clients = User::orderBy('created_at', 'desc')->simplePaginate(10);

        return view('backend.client.index', compact('clients'));
    }

    public function edit(string $id)
    {
        // gets specific admin user login information
        $user = User::findOrFail($id);

        return view('backend.client.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientProfileUpdateRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        // Validated rules for the form fields
        $validatedData = $request->validated();

        // Update the Clients attributes
        $user->update($validatedData);

        toast('Updated Successfully!','success')->width('300');

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage for password.
     */
    public function passwordUpdate(ClientPasswordUpdateRequest $request, string $id)
    {

        $client = User::findOrFail($id);

        // Validated rules for the form fields
        $validatedData = $request->validated();
        $validatedData['password'] = bcrypt($request->password);

        // Update the Clients attributes
        $client->update($validatedData);

        toast('Updated Successfully!','success')->width('300');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = User::findOrFail($id);

        $client->delete();

        return response(['status' => 'success', 'message' => __('Deleted Successfully!')]);

    }
}