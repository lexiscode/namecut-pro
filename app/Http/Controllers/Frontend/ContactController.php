<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactStoreRequest;

class ContactController extends Controller
{
    public function index()
    {
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

