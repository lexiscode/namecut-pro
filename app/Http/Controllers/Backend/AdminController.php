<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginAdminRequest;


class AdminController extends Controller
{
    public function index()
    {
        return view('frontend.admin-login');
    }

    public function login(Request $request)
    {
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){

            toast('Login Successful!','success')->width('300');

            return redirect()->route('admin.dashboard.index');

        }else{

            return back()->with('error', 'Invalid credentials! Try again.');
        }
    }


    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Logout Successful!');
    }

}
