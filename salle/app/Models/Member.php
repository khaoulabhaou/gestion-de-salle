<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    Use HasFactory;

    protected $table = 'membres';

    protected $fillable = [
        'nom_complet',
        'email',
        'mot_de_passe',
        'abonnement_actif',
        'user_id',
        'membership_id',
        'expiration_date',
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
        return $this->hasMany(Reservation::class);
    }

    public function paiements(){
        return $this->hasMany(Paiement::class, 'membre_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }

    public function coaches()
    {
        return $this->belongsToMany(Coache::class, 'coache_member', 'membres_id', 'coache_id');
    }


}