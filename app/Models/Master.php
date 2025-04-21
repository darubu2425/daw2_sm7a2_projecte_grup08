<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Master extends Model
{
    protected $primaryKey = 'identificador';
    
    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'nom',
        'hores',
        'director'
    ];

    public function alumnes(): HasMany
    {
        return $this->hasMany(Alumne::class, 'master', 'identificador');
    }
}