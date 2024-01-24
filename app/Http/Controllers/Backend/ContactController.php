<?php

namespace App\Http\Controllers\Backend;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    // permissions management
    public function __construct()
    {
        $this->middleware('role_or_permission:access management index,admin')->only('index');
        $this->middleware('role_or_permission:access management delete,admin')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->get();

        return view('backend.contact.index', compact('contacts'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);

        $contact->delete();

        return response(['status' => 'success', 'message' => __('Deleted Successfully!')]);

    }
}

