<?php

use App\Http\Controllers\QuotationController;
use App\Http\Controllers\InvoiceController;

Route::apiResource('quotations', QuotationController::class);
Route::apiResource('invoices', InvoiceController::class);
