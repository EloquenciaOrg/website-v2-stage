<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parametre extends Model
{
    protected $table = 'settings'; // Spécifie le nom de la table si ce n'est pas "members" (par défaut Laravel devine à partir du nom du modèle)
    protected $fillable = ['name', 'value', 'state']; // autoriser les champs à l’insertion
    protected $primaryKey = 'name'; // a specifier car Laravel pense que par défaut la clé primaire est id (en minuscule)
    protected $keyType = 'string'; // C'est une chaîne, pas un entier
    public $incrementing = false;  // Pas d'auto-incrément sur une clé textuelle
    public $timestamps = false;
}
