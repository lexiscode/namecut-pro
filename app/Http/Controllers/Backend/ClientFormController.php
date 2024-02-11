<?php

namespace App\Http\Controllers\Backend;

use Alert;
use App\Models\ClientForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Backend\ClientFormUpdateRequest;

class ClientFormController extends Controller
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
        $client_entries = ClientForm::orderBy('created_at', 'desc')->simplePaginate(10);

        return view('backend.client-form.index', compact('client_entries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client_entry = ClientForm::findOrFail($id);

        return view('backend.client-form.show', compact('client_entry'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client_entry = ClientForm::findOrFail($id);

        return view('backend.client-form.edit', compact('client_entry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientFormUpdateRequest $request, string $id)
    {
        // Find the Property model by ID
        $client_entry = ClientForm::findOrFail($id);

        // Validated rules for the form fields
        $validatedData = $request->validated();

        // Handle affidavit file upload
        if ($request->hasFile('affidavit')) {
            $affidavitImage = $request->file('affidavit');
            $affidavitImageName = time() . '_' . $affidavitImage->getClientOriginalName();

            // Move the uploaded affidavit image to the public directory
            $affidavitImage->move(public_path('uploads/affidavits'), $affidavitImageName);

            // Generate the URL for the affidavit image
            $affidavitImageUrl = url('uploads/affidavits/' . $affidavitImageName);

            // Save the affidavit image name to the database
            $validatedData['affidavit'] = $affidavitImageUrl;
        }

        // Handle certificate file upload
        if ($request->hasFile('certificate')) {
            $certificateImage = $request->file('certificate');
            $certificateImageName = time() . '_' . $certificateImage->getClientOriginalName();

            // Move the uploaded certificate image to the public directory
            $certificateImage->move(public_path('uploads/certificates'), $certificateImageName);

            // Generate the URL for the certificate image
            $certificateImageUrl = url('uploads/certificates/' . $certificateImageName);

            // Save the certificate image name to the database
            $validatedData['certificate'] = $certificateImageUrl;
        }

        // Update the Client entry attributes
        $client_entry->update($validatedData);

        toast('Updated Successfully!','success')->width('300');

        return redirect()->route('admin.client-form.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client_entry = ClientForm::findOrFail($id);

        $client_entry->delete();

        return response(['status' => 'success', 'message' => __('Deleted Successfully!')]);

    }
}

