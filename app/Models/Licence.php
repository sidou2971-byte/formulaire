<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Licence extends Model
{
    protected $fillable = [
        'numero_licence',
        'date_licence'
    ];

    public function dossiers()
    {
        return $this->belongsToMany(Dossier::class, 'dossier_licence');
    }
}
