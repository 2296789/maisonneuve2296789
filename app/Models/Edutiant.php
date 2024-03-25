<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edutiant extends Model
{
    use HasFactory;    
    
    protected $fillable = [
        'nom',
        'adresse',
        'telephone',
        'email',
        'date_naissance',
        'ville_id'
    ];
    public function ville(){
        return $this->belongsTo(Ville::class);
    }
    public function user(){
        return $this->hasOne(User::class);
    }
}
