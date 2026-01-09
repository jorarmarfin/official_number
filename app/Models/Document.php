<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    protected $fillable = [
        'year_id',
        'subject',
        'quantity',
        'recipient_email',
        'start_number',
        'end_number',
        'range'
    ];

    /**
     * Obtener el año al que pertenece el documento.
     */
    public function year(): BelongsTo
    {
        return $this->belongsTo(Year::class);
    }
}
