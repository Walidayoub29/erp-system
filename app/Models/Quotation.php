<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Quotation extends Eloquent
{
    protected $fillable = [
        'client_name',
        'client_email',
        'quotation_date',
        'expiration_date',
        'description',
        'amount',
        'status',
    ];
}
