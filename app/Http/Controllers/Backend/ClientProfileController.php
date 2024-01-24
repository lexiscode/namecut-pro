<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Backend\ClientProfileUpdateRequest;
use App\Http\Requests\Backend\ClientPasswordUpdateRequest;

class ClientProfileController extends Controller
{
    // permissions management
    public function __construct()
    {
        $this->middleware('role_or_permission:access management index,admin')->only('index');
        $this->middleware('role_or_permission:access management show,admin')->only('show');
        $this->middleware('role_or_permission:access management edit,admin')->only('edit', 'update');
        $this->middleware('role_or_permission:access management delete,admin')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // gets specific admin user login information
        $clients = User::orderBy('created_at', 'desc')->simplePaginate(10);

        return view('backend.client.index', compact('clients'));
    }

    public function show(string $id)
    {

        $client = User::with('client_form', 'payment', 'publish_receipt')->findOrFail($id);

        return view('backend.client.show', compact('client'));
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
