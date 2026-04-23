<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bl extends Model
{
    protected $table = 'bls';

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
