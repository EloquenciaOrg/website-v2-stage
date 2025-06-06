<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Chapter;
use App\Models\Parametre;

class LessonController extends Controller
{
    public function index()
    {
        $citations = [
            [
                'text' => "L'éloquence d'un homme se mesure à la manière dont il peut toucher le cœur des autres.",
                'author' => 'Abraham Lincoln',
            ],
            [
                'text' => "La connaissance parle, mais la sagesse écoute.",
                'author' => 'Jimi Hendrix',
            ],
            [
                'text' => "Il n’y a pas de vent favorable pour celui qui ne sait pas où il va.",
                'author' => 'Sénèque',
            ],
            [
                'text' => "L’éloquence consiste à dire tout ce qu’il faut, et rien que ce qu’il faut.",
                'author' => 'La Bruyère',
            ],
            [
                'text' => "Parler est un besoin, écouter est un art.",
                'author' => 'Goethe',
            ],
            [
                'text' => "L'art de la persuasion repose moins sur la logique que sur l'émotion.",
                'author' => 'Blaise Pascal',
            ],
            [
                'text' => "Ce qui se conçoit bien s’énonce clairement, et les mots pour le dire arrivent aisément.",
                'author' => 'Nicolas Boileau',
            ],
            [
                'text' => "Le secret de l'éloquence, c'est la sincérité.",
                'author' => 'Jean Jaurès',
            ],
            [
                'text' => "La parole a été donnée à l’homme pour déguiser sa pensée.",
                'author' => 'Talleyrand',
            ],
            [
                'text' => "Un bon discours doit être comme une jupe : assez long pour couvrir le sujet et assez court pour susciter l'intérêt.",
                'author' => 'Winston Churchill',
            ],
            [
                'text' => "L'éloquence est une peinture de la pensée.",
                'author' => 'Blaise Pascal',
            ],
            [
                'text' => "Le silence est parfois la plus éloquente des réponses.",
                'author' => 'Albert Camus',
            ],
        ];

        $citation = $citations[array_rand($citations)];

        $chapters = Chapter::orderBy('ID')->get();

        $data = Parametre::where('name', 'announcement_lms')->where('state', 1)->first();
        if ($data)
        {
            $setting = json_decode($data->value);
            return view('lms.lms', compact('chapters','setting','citation'));
        }
        else
        {
            $setting = null;
            return view('lms.lms', compact('chapters','setting','citation'));
        }
    }

    public function chapitre($id)
    {
        $lessons = Lesson::where('chapter',$id)->get();
        $chapters = Chapter::orderBy('ID')->get();
        $chapitre = Chapter::find($id);

        return view('lms.chapitre', compact('lessons', 'chapters', 'chapitre'));
    }
}
