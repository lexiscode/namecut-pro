<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterStoreRequest;

class RegisterController extends Controller
{
    /**
     * Displays the registration form page
     */
    public function index()
    {
        return view('frontend.register');
    }


    /**
     * Store user inputs into the database
     */
    public function store(RegisterStoreRequest $request)
    {
        
        $validatedData = $request->validated();

        // Create a new user using the validated data
        User::create($validatedData);

        // Adds a success message or redirect the user after successful registration
        return redirect()->route('home')->with('success', 'Registration successful! Login now.');
    }
}

