<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Contact;
use App\Models\ClientForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ContactStoreRequest;

class ContactController extends Controller
{
    public function index()
    {
        // Check if a user is authenticated
        if(Auth::check()){
            // Get the currently logged-in user
            $user = Auth::user();

            // Retrieve client form data for the user using the relationship
            $client_form = $user->client_form;

            return view('frontend.contact', compact('client_form'));
        }
        return view('frontend.contact');
    }

    public function store(ContactStoreRequest $request)
    {
        // Validated rules for the form fields
        $validatedData = $request->validated();

        // Create a new blog using the validated data
        Contact::create($validatedData);

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}

