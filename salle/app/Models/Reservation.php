<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    Use HasFactory;

    protected $fillable = [
        'member_id',
        'cours_id',
        'date_reservation',
        'status'
    ];

    protected $casts = [
        'date_reservation' => 'datetime'
    ];

    public function members(){
        $this->belongsTo(Member::class);
    }

    public function cours(){
        $this->belongsTo(Cour::class);
    }
}
