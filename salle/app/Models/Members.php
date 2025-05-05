<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    Use HasFactory;

    protected $fillable = [
        'nom_complet',
        'email',
        'mot_de_passe',
        'abonnement_actif'
    ];

    protected $hidden = [
        'mot_de_passe',
        'remember_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'abonnement_actif' => 'boolean',
    ];

    public function reservations(){
        return $this->hasMany(Reservations::class);
    }

    public function paiements(){
        return $this->hasMany(Paiements::class);
    }
}