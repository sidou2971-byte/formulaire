<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OperateurFonctionnement extends Model
{
    protected $table = 'operateur_fonctionnements';

    protected $fillable = [
        'rc',
        'mot_de_passe',
        'telephone',
        'raison_sociale'
    ];

    public function dossiers()
    {
        return $this->morphMany(Dossier::class, 'operateur');
    }
}
