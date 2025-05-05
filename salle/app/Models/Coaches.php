<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coaches extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_complet',
        'email',
        'specialite'
    ];

    public function Cours(){
        return $this->hasMany(Cours::class);
    }
}