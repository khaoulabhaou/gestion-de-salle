<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'email', 'subject', 'message', 'status'
    ];

    protected $attributes = [
        'status' => false,
    ];
    
    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
