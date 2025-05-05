<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;

    protected $fillable = [
        'coach_id',
        'capacite',
        'titre',
        'description',
        'duree',
        'prix'
    ];

    public function reservations(){
       return $this->hasMany(Reservations::class);
    }

    public function coaches(){
        return $this->belongsTo(Coaches::class);
    }

    public function plan(){
        return $this->hasOne(Plannings::class);
    }
}