<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    use HasFactory;

    protected $fillable = [
        'jour',
        'heure',
        'cours_id'
    ];

    public function cour(){
        return $this -> belongsTo(Cour::class);
    }
}