<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function index()
    {
        return Quotation::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client_name' => 'required|string',
            'client_email' => 'required|email',
            'quotation_date' => 'required|date',
            'expiration_date' => 'nullable|date',
            'description' => 'required|string',
            'product_description' => 'required|string',
            'quantity' => 'required|integer',
            'delivered' => 'required|integer',
            'invoiced' => 'required|integer',
            'unit_price' => 'required|numeric',
            'taxes' => 'required|numeric',
            'tax_excl' => 'required|numeric',
            'untaxed_amount' => 'required|numeric',
            'vat_9' => 'required|numeric',
            'total' => 'required|numeric',
            'status' => 'string|in:draft,sent,accepted,rejected',
        ]);

        $quotation = Quotation::create($validatedData);
        return response()->json($quotation, 201);
    }

    public function show($id)
    {
        $quotation = Quotation::find($id);
        if (!$quotation) {
            return response()->json(['message' => 'Quotation not found'], 404);
        }
        return response()->json($quotation);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'client_name' => 'required|string',
            'client_email' => 'required|email',
            'quotation_date' => 'required|date',
            'expiration_date' => 'nullable|date',
            'description' => 'required|string',
            'product_description' => 'required|string',
            'quantity' => 'required|integer',
            'delivered' => 'required|integer',
            'invoiced' => 'required|integer',
            'unit_price' => 'required|numeric',
            'taxes' => 'required|numeric',
            'tax_excl' => 'required|numeric',
            'untaxed_amount' => 'required|numeric',
            'vat_9' => 'required|numeric',
            'total' => 'required|numeric',
            'status' => 'string|in:draft,sent,accepted,rejected',
        ]);

        $quotation = Quotation::findOrFail($id);
        $quotation->update($validatedData);
        return response()->json($quotation, 200);
    }

    public function destroy($id)
    {
        $quotation = Quotation::findOrFail($id);
        $quotation->delete();
        return response()->json(null, 204);
    }
}
