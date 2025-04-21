<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Alumne extends Model
{
    protected $primaryKey = 'identificador';

    protected $fillable = [
        'nom',
        'correu',
        'adreça',
        'ciutat',
        'pais',
        'telefon',
        'master_id',
    ];
    
    public function master(): BelongsTo
    {
        return $this->belongsTo(Master::class, 'master_id', 'identificador');
    }
}