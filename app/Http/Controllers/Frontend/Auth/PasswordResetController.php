<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\UserSendResetLinkMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SendUserResetLinkRequest;
use App\Http\Requests\UserResetPasswordRequest;

class PasswordResetController extends Controller
{
    public function index()
    {
        return view('frontend.forgot-password');
    }

    public function sendResetLink(SendUserResetLinkRequest $request)
    {
        // Check if the user with the provided email exists
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'The email does not match our records.');
        }

        // Generate a random token
        $token = Str::random(64);

        // Save the token in the user's remember_token field
        $user->remember_token = $token;
        $user->save();

        // Send the reset link email
        Mail::to($request->email)->send(new UserSendResetLinkMail($token, $request->email));

        // Redirect with success message
        return redirect()->back()->with('success', 'A mail has been sent to your email.');

    }


    public function resetPassword($token)
    {
        // Retrieve the email from the query string in the browser
        $email = request('email');

        return view('frontend.reset-password', compact('email', 'token'));
    }


    public function handleResetPassword(UserResetPasswordRequest $request)
    {
        $user = User::where(['email' => $request->email, 'remember_token' => $request->token])->first();

        if(!$user){
            return back()->with('error', 'Invalid token');
        }

        $user->password = bcrypt($request->password);
        $user->remember_token = null;
        $user->save();

        return redirect()->route('home')->with('success', 'Password reset successful. Try login now.');
    }
}
