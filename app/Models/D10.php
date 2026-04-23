<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class D10 extends Model
{
    protected $table = 'd10s';

    protected $fillable = [
        'dossier_id',
        'pays_origine',
        'pays_expediteur',
        'montant',
        'quantite',
        'piece_jointe'
    ];

    public function dossier()
    {
        return $this->belongsTo(Dossier::class);
    }
}
