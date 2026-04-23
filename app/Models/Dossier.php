<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    protected $fillable = [
        'secteur_id',
        'montant',
        'domiciliation',
        'remarque'
    ];

    public function operateur()
    {
        return $this->morphTo();
    }

    public function secteur()
    {
        return $this->belongsTo(Secteur::class);
    }

    public function banques()
    {
        return $this->belongsToMany(Banque::class, 'dossier_banque');
    }

    public function licences()
    {
        return $this->belongsToMany(Licence::class, 'dossier_licence');
    }

    public function d10s()
    {
        return $this->hasMany(D10::class);
    }

    public function bls()
    {
        return $this->hasMany(Bl::class);
    }

    public function aas()
    {
        return $this->hasMany(Aa::class);
    }

    public function traitements()
    {
        return $this->hasMany(Traitement::class);
    }
}
