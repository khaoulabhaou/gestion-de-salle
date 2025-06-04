<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    
    protected $fillable = [
        'nom',
        'image',
        'description',
    ];

    public function cours(){
        return $this->hasMany(Cour::class);
    }

    public function coaches()
    {
        return $this->hasManyThrough(Coache::class, Cour::class, 'category_id', 'id', 'id', 'coach_id');
    }

}