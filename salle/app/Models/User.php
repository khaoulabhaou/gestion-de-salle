<?php

namespace App\Models;

use App\Models\Member;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'membership_id',
        'password',
        'phone',
        'dob',
        'gender',
        'address',
        'goal',
        'pfp', // profile picture
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }

    public function member(){
        return $this->hasOne(Member::class, 'user_id');
    }

}
