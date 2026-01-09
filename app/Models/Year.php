<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Year extends Model
{
    protected $fillable = ['name', 'active'];

    public $timestamps = false;

    /**
     * Obtener los documentos asociados al año.
     */
    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    /**
     * Scope para obtener solo años activos.
     */
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}
