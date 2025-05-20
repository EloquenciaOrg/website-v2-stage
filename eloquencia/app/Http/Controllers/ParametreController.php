<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parametre;

class ParametreController extends Controller
{
    public function index()
    {
        $settings = Parametre::where('name', 'notifications')->get();
        $articles = Parametre::where('name', 'like','article_a_la_une%')->where('state', 1)->get();
        $blogs = Parametre::where('name', 'like','blog_article%')->where('state', 1)->get();
        $partenaires = Parametre::where('name', 'like','partenaire%')->where('state', 1)->get();
        

        return view('admin.parametre', compact('settings','articles','blogs','partenaires'));
    }

    public function index_welcome()
    {
        $articles = Parametre::where('name', 'like','article_a_la_une%')->where('state', 1)->get();
        $data = Parametre::where('name', 'notifications')->where('state', 1)->first();
        $partenaires = Parametre::where('name', 'like','partenaire%')->where('state', 1)->get();
        if ($data)
        {
            $setting = json_decode($data->value);
            return view('welcome', compact('setting','articles','partenaires'));
        }
        else
        {
            $setting = null;
            return view('welcome', compact('setting','articles','partenaires'));
        }
        
    }

    public function index_blog()
    {
        $records = Parametre::where('name', 'like', 'blog_article%')->where('state', 1)->get();
        $blogs = $records->map(function($item) {
            $data = json_decode($item->value);
            $data->name = $item->name; // facultatif si on veux l’utiliser
            return $data;
        });
        return view('blog', compact('blogs'));
        $blogs = Parametre::where('name', 'like','blog_article%')->where('state', 1)->get();

        return view('blog', compact('blogs'));
    }

    public function desactiver(Request $request)
    {
        $id = $request->id;
        $notif = Parametre::find($id);
        $notif->state = 0;
        $notif->save();
        return back()->with('success', 'Notification désactivé');
    }

    public function activer(Request $request)
    {
        $id = $request->id;
        $notif = Parametre::find($id);
        $notif->state = 1;
        $notif->save();
        return back()->with('success', 'Notification activé');
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $notif = Parametre::find($id);
        $notif->value = json_encode([
            'content' => $request->value
        ]);

        $notif->save();
        return back()->with('success', 'Notification mis a jour');
    }

    public function article_delete(Request $request)
    {
        $id = $request->id;
        $article = Parametre::find($id);

        $article->delete();
        return back()->with('success', 'Articles supprimé');
    }

    public function article_add(Request $request)
    {
        // Validation de base
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        // Récupère tous les articles "à la une" existants
        $last = Parametre::where('name', 'like', 'article_a_la_une_%')
                        ->orderByRaw('CAST(SUBSTRING(name, 18) AS UNSIGNED) DESC')
                        ->first();

        // Détermine le prochain numéro d'article
        $nextId = 1;
        if ($last) {
            $parts = explode('_', $last->name);
            $lastNum = intval(end($parts));
            $nextId = $lastNum + 1;
        }

        // Nouveau nom basé sur l’ID suivant
        $name = 'article_a_la_une_' . $nextId;
        $image = 'images/' . $request->image;

        // Création de l’article
        $article = new Parametre();
        $article->name = $name;
        $article->state = 1;
        $article->value = json_encode([
            'title' => $request->title,
            'image' => $image,
            'description' => $request->description,
            'link' => ''
        ]);

        $article->save();

        return back()->with('success', 'Article ajouté avec succès.');
    }

    public function article_blog_delete(Request $request)
    {
        $id = $request->id;
        $article = Parametre::find($id);

        $article->delete();
        return back()->with('success', 'Articles du blog supprimé');
    }

    public function article_blog_add(Request $request)
    {
        // Validation de base
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        // Récupère tous les articles "à la une" existants
        $last = Parametre::where('name', 'like', 'blog_article%')
                        ->orderByRaw('CAST(SUBSTRING(name, 18) AS UNSIGNED) DESC')
                        ->first();

        // Détermine le prochain numéro d'article
        $nextId = 1;
        if ($last) {
            $parts = explode('_', $last->name);
            $lastNum = intval(end($parts));
            $nextId = $lastNum + 1;
        }

        // Nouveau nom basé sur l’ID suivant
        $name = 'blog_article_' . $nextId;
        $image = 'images/' . $request->image;

        // Création de l’article
        $article = new Parametre();
        $article->name = $name;
        $article->state = 1;
        $article->value = json_encode([
            'title' => $request->title,
            'image' => $image,
            'description' => $request->description,
            'link' => ''
        ]);

        $article->save();

        return back()->with('success', 'Article ajouté avec succès.');
    }

    public function partenaire_add(Request $request)
    {
        // Validation de base
        $request->validate([
            'nom' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'since' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        // Récupère tous les articles "à la une" existants
        $last = Parametre::where('name', 'like', 'partenaire%')
                        ->orderByRaw('CAST(SUBSTRING(name, 18) AS UNSIGNED) DESC')
                        ->first();

        // Détermine le prochain numéro d'article
        $nextId = 1;
        if ($last) {
            $parts = explode('_', $last->name);
            $lastNum = intval(end($parts));
            $nextId = $lastNum + 1;
        }

        // Nouveau nom basé sur l’ID suivant
        $name = 'partenaire_' . $nextId;
        $image = 'images/' . $request->image;

        // Création de l’article
        $article = new Parametre();
        $article->name = $name;
        $article->state = 1;
        $article->value = json_encode([
            'nom' => $request->nom,
            'image' => $image,
            'description' => $request->description,
            'depuis' => $request->since,
            'link' => $request->link
        ]);

        $article->save();

        return back()->with('success', 'Article ajouté avec succès.');
    }

    public function partenaire_delete(Request $request)
    {
        $id = $request->name;
        $article = Parametre::find($id);

        $article->delete();
        return back()->with('success', 'c supprimé');
    }
}
