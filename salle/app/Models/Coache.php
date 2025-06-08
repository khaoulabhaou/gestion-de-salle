<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coache extends Model
{
    use HasFactory;
    
    protected $table = 'coaches';

    protected $fillable = [
        'nom_complet',
        'email',
        'categorie'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'categorie');
    }
    
    public function Cours(){
        return $this->hasMany(Cour::class);
    }

    public function membres()
    {
        return $this->belongsToMany(Member::class, 'coache_member', 'coache_id', 'membres_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function plannings()
    {
        return $this->hasMany(Planning::class, 'coache_id');
    }



}