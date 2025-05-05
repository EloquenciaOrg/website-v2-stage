<?php

namespace App\Http\Controllers;
use App\Models\Messagerie;


use Illuminate\Http\Request;

class MessagerieController extends Controller
{
    public function index(Request $request)
    {
        $order = $request->get('order', 'asc'); // Par défaut croissant

        $messages = Messagerie::orderBy('datetime', $order)->get();
        //$messages = Messagerie::all();
        return view('messagerie', compact('messages'));
    }

    public function store(Request $request)
    {
        // Validation des champs
        $request->validate([
            'name' => 'required|max:40',
            'email' => 'required|email|max:60',
            'message' => 'required',
        ]);

        // Enregistrement en base
        Messagerie::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        // Redirection avec message de succès
        return redirect()->back()->with('success', 'Message envoyé avec succès.');
    }

    public function supp(Request $request)
    {
        $id = $request->input('id');

        $message = Messagerie::find($id);

        if (!$message) {
            return back()->with('error', 'Message introuvable.');
        }

        $message->delete();

        return back()->with('success', 'Message supprimé avec succès.');
    }
}