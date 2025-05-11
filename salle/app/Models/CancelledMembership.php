<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancelledMembership extends Model
{
    use HasFactory;

    protected $table = 'canceled_memberships';

    protected $fillable = [
        'user_id',
        'membership_id',
        'cancellation_date',
    ];

    public $timestamps = true;

    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
