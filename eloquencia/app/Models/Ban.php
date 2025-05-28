<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
    public $timestamps = false; // Cela indique à Laravel de ne pas gérer automatiquement les colonnes created_at et updated_at.
    

    protected $fillable = [
        'email',
        'ip'
    ];
}
