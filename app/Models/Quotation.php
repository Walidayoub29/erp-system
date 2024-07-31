<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Quotation extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'quotations';

    protected $fillable = [
        'client_name', 'client_email', 'quotation_date', 'expiration_date', 'description', 'amount', 'status',
        'product_description', 'quantity', 'delivered', 'invoiced', 'unit_price', 'taxes', 'tax_excl', 'untaxed_amount', 'vat_9', 'total'
    ];
}
