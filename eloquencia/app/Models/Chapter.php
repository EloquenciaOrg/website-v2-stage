<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Chapter extends Model
{
    protected $table = 'lessons_chapters';
    public $timestamps = false; // Cela indique à Laravel de ne pas gérer automatiquement les colonnes created_at et updated_at.
    protected $primaryKey = 'ID'; // a specifier car Laravel pense que par défaut la clé primaire est id (en minuscule)

    protected $fillable = [
        'name',
        'description',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'chapter'); // association clé etrangere -> un chapitre contient plusieurs leçons
    }
}
