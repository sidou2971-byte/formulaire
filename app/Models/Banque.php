<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banque extends Model
{
    protected $fillable = [
        'nom_banque'
    ];

    public function dossiers()
    {
        return $this->belongsToMany(Dossier::class, 'dossier_banque');
    }
}
