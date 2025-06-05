<?php

namespace App\Models;

use App\Models\Coache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Planning extends Model
{
    use HasFactory;

    protected $fillable = [
        'jour',
        'heure',
        'cour_id',
        'coache_id',
        'heure_debut',
        'heure_fin'        
    ];

    public function cour(){
        return $this -> belongsTo(Cour::class);
    }

    public function coache(){
        return $this -> belongsTo(Coache::class);
    }
}