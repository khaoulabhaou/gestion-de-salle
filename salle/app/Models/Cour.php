<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    use HasFactory;

    protected $table = 'cours';

    protected $fillable = [
        'coach_id',
        'capacite_max',
        'titre',
        'description',
        'duree',
        'prix',
        'statut'
    ];

    public function reservations(){
       return $this->hasMany(Reservation::class);
    }

    public function coaches(){
        return $this->belongsTo(Coache::class);
    }

    public function plan(){
        return $this->hasOne(Planning::class);
    }
}