<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quotation;

class QuotationController extends Controller
{
    public function index()
    {
        return Quotation::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_email' => 'required|string|email|max:255',
            'quotation_date' => 'required|date',
            'expiration_date' => 'nullable|date',
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'status' => 'required|string|in:draft,sent,accepted,rejected',
        ]);

        $quotation = Quotation::create($request->all());
        return response()->json($quotation, 201);
    }

    public function show($id)
    {
        return Quotation::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'client_name' => 'string|max:255',
            'client_email' => 'string|email|max:255',
            'quotation_date' => 'date',
            'expiration_date' => 'nullable|date',
            'description' => 'string',
            'amount' => 'numeric',
            'status' => 'string|in:draft,sent,accepted,rejected',
        ]);

        $quotation = Quotation::findOrFail($id);
        $quotation->update($request->all());
        return response()->json($quotation, 200);
    }

    public function destroy($id)
    {
        Quotation::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
