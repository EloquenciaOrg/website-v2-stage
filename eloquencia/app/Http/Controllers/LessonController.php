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

    public function index_lecons()
    {
        $chapters = Chapter::orderBy('ID')->get();
        $lessons = Lesson::orderBy('ID')->get();
        return view('admin.lecons', compact('chapters','lessons'));
    }

    public function chapitre($id)
    {
        $lessons = Lesson::where('chapter',$id)->get();
        $chapters = Chapter::orderBy('ID')->get();
        $chapitre = Chapter::find($id);

        return view('lms.chapitre', compact('lessons', 'chapters', 'chapitre'));
    }

    public function show($id)
    {
        $lesson = Lesson::find($id);
        $chapters = Chapter::orderBy('ID')->get();
        $chapitre = Chapter::find($lesson->chapter);

        return view('lms.lecon', compact('lesson', 'chapters', 'chapitre'));
    }

    public function lesson_add(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'chapter' => 'required|int',
            'summary' => 'required|string',
        ]);

        Lesson::create([
            'title' => $request->title,
            'content' => $request->content,
            'summary' => $request->summary,
            'chapter' => $request->chapter,
        ]);

        return redirect()->back()->with('success', 'Leçon ajouté avec succès.');
    }

    public function chapter_add(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Chapter::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Chapitre ajouté avec succès.');
    }

    public function lecon_delete($id)
    {
        $lesson = Lesson::find($id);
        if ($lesson) {
            $lesson->delete();
            return redirect()->back()->with('success', 'Leçon supprimée avec succès.');
        } else {
            return redirect()->back()->with('error', 'Leçon non trouvée.');
        }
    }

    public function chapitre_delete($id)
    {
        $chapitre = Chapter::find($id);
        if ($chapitre) {
            $chapitre->delete();
            return redirect()->back()->with('success', 'Chapitre supprimée avec succès.');
        } else {
            return redirect()->back()->with('error', 'Chapitre non trouvée.');
        }
    }

    public function lecon_edit($id, Request $request)
    {
        $validated = $request->validate([
            'title'   => 'required|string',
            'summary' => 'required|string',
            'content' => 'required|string',
            'chapter' => 'required|integer',
        ]);

        $lesson = Lesson::findOrFail($id);

        $lesson->update([
            'title'   => $validated['title'],
            'summary' => $validated['summary'],
            'content' => $validated['content'],
            'chapter' => $validated['chapter'],
        ]);

        // Rediriger ou renvoyer une réponse
        return redirect()->back()->with('success', 'Leçon mise à jour avec succès.');
    }

    public function chapitre_edit($id, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $chapter = Chapter::findOrFail($id);

        $chapter->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);

        // Rediriger ou renvoyer une réponse
        return redirect()->back()->with('success', 'Chapitre mise à jour avec succès.');
    }

    public function envoie_chap_modif($id)
    {
        $chapter = Chapter::findOrFail($id);
        return view('admin.chap_edit', compact('chapter'));
    }

}
