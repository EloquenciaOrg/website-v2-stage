<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{

    public function index_blog()
    {
        $blogs = Blog::all(); // récupère tous les articles depuis la table

        return view('blog', compact('blogs'));
    }

    public function article_delete(Request $request)
    {
        $id = $request->id;
        $article = Blog::find($id);

        $article->delete();

        if ($article->pic && str_starts_with($article->pic, 'http')) {
            $imagePath = public_path(parse_url($article->pic, PHP_URL_PATH));
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        return back()->with('success', 'Articles supprimé');
    }

    public function article_add(Request $request)
    {
        // Validation
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'summary' => 'required|string',
            'pic' => 'required|file|image',
        ]);

        $file = $request->file('pic');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $fileName);

        // URL absolue de l'image
        $imageUrl = url('images/' . $fileName);

        Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'summary' => $request->summary,
            'pic' => $imageUrl,
            'featured' => $request->has('featured'),
        ]);

        return back()->with('success', 'Article ajouté avec succès.');
    }

    public function article($id)
    {
        $article = Blog::find($id);

        if (!$article) {
            abort(404, 'Article introuvable.');
        }

        return view('article', compact('article'));
    }
}
