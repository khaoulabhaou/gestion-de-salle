<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $table = 'memberships';

    protected $fillable = [
        'name',       
        'description',
        'price',
        'duration'
    ];

    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
