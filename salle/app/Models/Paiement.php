<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'montant',
        'member_id',
        'membership_id'
    ];

    public function members(){
        return $this->belongsTo(Member::class);
    }
}
