<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Invoice extends Eloquent
{
    protected $fillable = [
        'client_name',
        'client_email',
        'invoice_date',
        'due_date',
        'description',
        'amount',
        'status',
    ];
}
