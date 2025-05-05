<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public $timestamps = false; // Cela indique à Laravel de ne pas gérer automatiquement les colonnes created_at et updated_at.
    protected $primaryKey = 'ID'; // a specifier car Laravel pense que par défaut la clé primaire est id (en minuscule)
    

    protected $fillable = [
        'email',
        'password'
    ];
}
