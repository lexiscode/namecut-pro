<?php

namespace App\Http\Controllers\Frontend;

use App\Models\ClientForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __invoke()
    {
        // Check if a user is authenticated
        if (Auth::check()) {
            // Get the current authenticated user
            $currentUser = Auth::user();

            // Check if a ClientForm exists for the current user
            $clientForm = ClientForm::where('user_id', $currentUser->id)->first();

            // returns either "exists/true or null" for the current user
            return view('frontend.home', compact('clientForm'));
        }

        return view('frontend.home');
    }
}

