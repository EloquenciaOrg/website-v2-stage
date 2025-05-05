<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messagerie extends Model
{
    protected $table = 'contact'; // Spécifie le nom de la table si ce n'est pas "members" (par défaut Laravel devine à partir du nom du modèle)
    protected $fillable = ['name', 'email', 'message']; // autoriser les champs à l’insertion
    protected $primaryKey = 'ID'; // a specifier car Laravel pense que par défaut la clé primaire est id (en minuscule)
    public $timestamps = false;

}
