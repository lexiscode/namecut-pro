<?php

namespace App\Http\Controllers\Frontend;

use App\Models\ClientForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ClientFormStoreRequest;

class ClientFormController extends Controller
{
    public function index()
    {
        return view('frontend.client-form');
    }

    public function store(ClientFormStoreRequest $request)
    {
        // Validated rules for the form fields
        $validatedData = $request->validated();
        //dd($validatedData);

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

        // Associate the form data with the currently authenticated user
        $validatedData['user_id'] = Auth::id();

        // Submit a new client-form using the validated data
        ClientForm::create($validatedData);

        return redirect()->route('home')->with('success', 'Your form has been submitted!');
    }
}
