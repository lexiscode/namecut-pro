<?php

namespace App\Http\Controllers\Backend;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
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
        $payments = Payment::orderBy('created_at', 'desc')->simplePaginate(10);

        return view('backend.payment.index', compact('payments'));
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
        $payment = Payment::findOrFail($id);

        return view('backend.payment.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment = Payment::findOrFail($id);

        return view('backend.payment.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the Payment model by ID
        $payment = Payment::findOrFail($id);

        // Update the Payment data attributes
        $payment->update($request->all());

        toast('Updated Successfully!','success')->width('300');

        return redirect()->route('admin.payment.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payment = Payment::findOrFail($id);

        $payment->delete();

        return response(['status' => 'success', 'message' => __('Deleted Successfully!')]);

    }
}
