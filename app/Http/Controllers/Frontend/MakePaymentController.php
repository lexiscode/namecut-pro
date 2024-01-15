<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MakePaymentController extends Controller
{
    public function index()
    {
        // Get the current authenticated user
        $currentUser = Auth::user();

        // Check if a Payment exists for the current user
        $payment = Payment::where('user_id', $currentUser->id)->first();

        // If Payment exists, redirect to the homepage
        if ($payment) {
            return redirect('/')->with('status', 'You have made payment already!');
        }

        return view('frontend.make-payment');
    }
}

