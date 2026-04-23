<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Traitement extends Model
{
    protected $fillable = [
        'dossier_id',
        'admin_id',
        'statut',
        'commentaire',
        'date_traitement'
    ];

    public function dossier()
    {
        return $this->belongsTo(Dossier::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
