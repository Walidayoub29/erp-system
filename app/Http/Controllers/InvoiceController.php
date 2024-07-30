<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    public function index()
    {
        return Invoice::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_email' => 'required|string|email|max:255',
            'invoice_date' => 'required|date',
            'due_date' => 'nullable|date',
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'status' => 'required|string|in:unpaid,paid,overdue',
        ]);

        $invoice = Invoice::create($request->all());
        return response()->json($invoice, 201);
    }

    public function show($id)
    {
        return Invoice::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'client_name' => 'string|max:255',
            'client_email' => 'string|email|max:255',
            'invoice_date' => 'date',
            'due_date' => 'nullable|date',
            'description' => 'string',
            'amount' => 'numeric',
            'status' => 'string|in:unpaid,paid,overdue',
        ]);

        $invoice = Invoice::findOrFail($id);
        $invoice->update($request->all());
        return response()->json($invoice, 200);
    }

    public function destroy($id)
    {
        Invoice::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
