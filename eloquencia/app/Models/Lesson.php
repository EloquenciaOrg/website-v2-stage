<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lessons';
    public $timestamps = false; // Cela indique à Laravel de ne pas gérer automatiquement les colonnes created_at et updated_at.
    protected $primaryKey = 'ID'; // a specifier car Laravel pense que par défaut la clé primaire est id (en minuscule)

    protected $fillable = [
        'title',
        'summary',
        'content',
        'chapter', // Clé étrangère vers le chapitre
    ];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'chapter'); // association clé etrangere -> une leçon appartient à un chapitre.
    }
}
