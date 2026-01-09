<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Document extends Model
{
    protected $fillable = ['year_id', 'subject', 'quantity', 'recipient_email',
        'start_number', 'end_number','range'
    ];

}
