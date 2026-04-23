<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Secteur extends Model
{
    protected $fillable = [
        'nom'
    ];

    public function dossiers()
    {
        return $this->hasMany(Dossier::class);
    }
}
