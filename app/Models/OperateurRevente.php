<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OperateurRevente extends Model
{
    protected $table = 'operateur_reventes';

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
