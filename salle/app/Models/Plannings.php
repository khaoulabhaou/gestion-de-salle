<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plannings extends Model
{
    use HasFactory;

    protected $fillable = [
        'jour',
        'heure',
        'cours_id'
    ];

    public function cours(){
        return $this -> belongsTo(Cours::class);
    }
}