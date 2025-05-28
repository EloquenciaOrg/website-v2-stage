<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog'; // Spécifie le nom de la table si ce n'est pas "members" (par défaut Laravel devine à partir du nom du modèle)
    protected $fillable = ['title', 'content', 'pic', 'summary','featured']; // autoriser les champs à l’insertion
    protected $primaryKey = 'id'; // a specifier car Laravel pense que par défaut la clé primaire est id (en minuscule)
    public $timestamps = false;
}
