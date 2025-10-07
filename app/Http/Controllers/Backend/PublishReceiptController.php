<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\PublishReceipt;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\PublishReceiptRequest;

class PublishReceiptController extends Controller
{
    // permissions management
    public function __construct()
    {
        $this->middleware('role_or_permission:access management index,admin')->only('index');
        $this->middleware('role_or_permission:access management create,admin')->only('create', 'store');
        $this->middleware('role_or_permission:access management show,admin')->only('show');
        $this->middleware('role_or_permission:access management edit,admin')->only('edit', 'update');
        $this->middleware('role_or_permission:access management delete,admin')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publish_receipts = PublishReceipt::orderBy('created_at', 'desc')->simplePaginate(10);

        return view('backend.publish-receipt.index', compact('publish_receipts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.publish-receipt.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublishReceiptRequest $request)
    {
        // Validated rules for the form fields
        $validatedData = $request->validated();

        // Handle receipt file upload
        if ($request->hasFile('receipt_file')) {
            $receiptFile = $request->file('receipt_file');
            $receiptFileName = time() . '_' . $receiptFile->getClientOriginalName();

            // Move the uploaded receipt file to the public directory
            $receiptFile->move(public_path('uploads/receipts'), $receiptFileName);

            // Generate the URL for the receipt file
            $receiptFileUrl = url('uploads/receipts/' . $receiptFileName);

            // Save the affidavit image name to the database
            $validatedData['receipt_file'] = $receiptFileUrl;
        }

        // Submit a new client-form using the validated data
        PublishReceipt::create($validatedData);

        toast('Receipt Generated Successfully!','success')->width('300');

        return redirect()->route('admin.publish-receipt.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PublishReceipt $publish_receipt)
    {
        return view('backend.publish-receipt.show', compact('publish_receipt'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PublishReceipt $publish_receipt)
    {
        return view('backend.publish-receipt.edit', compact('publish_receipt'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublishReceiptRequest $request, string $id)
    {
        // Find the Publish Receipt model by ID
        $publish_receipt = PublishReceipt::findOrFail($id);

        // Validated rules for the form fields
        $validatedData = $request->validated();

        // Handle receipt file upload
        if ($request->hasFile('receipt_file')) {
            $receiptFile = $request->file('receipt_file');
            $receiptFileName = time() . '_' . $receiptFile->getClientOriginalName();

            // Move the uploaded receipt file to the public directory
            $receiptFile->move(public_path('uploads/receipts'), $receiptFileName);

            // Generate the URL for the receipt file
            $receiptFileUrl = url('uploads/receipts/' . $receiptFileName);

            // Save the affidavit image name to the database
            $validatedData['receipt_file'] = $receiptFileUrl;
        }

        // Update the Publish Receipt data attributes
        $publish_receipt->update($validatedData);

        toast('Updated Successfully!','success')->width('300');

        return redirect()->route('admin.publish-receipt.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PublishReceipt $publish_receipt)
    {
        $publish_receipt->delete();

        return response(['status' => 'success', 'message' => __('Deleted Successfully!'),]);
    }
}
