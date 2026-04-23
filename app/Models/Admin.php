<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'nom',
        'email',
        'mot_de_passe'
    ];

    protected $hidden = [
        'mot_de_passe',
    ];

    public function traitements()
    {
        return $this->hasMany(Traitement::class);
    }
}
