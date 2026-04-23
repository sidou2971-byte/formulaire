<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aa extends Model
{
    protected $table = 'aas';

    protected $fillable = [
        'dossier_id',
        'montant',
        'quantite',
        'piece_jointe'
    ];

    public function dossier()
    {
        return $this->belongsTo(Dossier::class);
    }
}
