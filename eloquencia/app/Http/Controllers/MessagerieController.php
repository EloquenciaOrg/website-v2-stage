<?php

namespace App\Http\Controllers;
use App\Models\Messagerie;
use App\Models\Ban;
use App\Services\Captcha;


use Illuminate\Http\Request;

class MessagerieController extends Controller
{
    public function index(Request $request)
    {
        $order = $request->get('order', 'asc'); // Par défaut croissant

        $messages = Messagerie::orderBy('datetime', $order)->get();
        //$messages = Messagerie::all();
        return view('admin.messagerie', compact('messages'));
    }

    public function store(Request $request)
    {
        // Validation des champs
        $request->validate([
            'name' => 'required|max:40',
            'email' => 'required|email|max:60',
            'message' => 'required',
            'captcha' => 'required',
            'cgu' => 'accepted'
        ]);

        $captcha = new Captcha();
        if (!$captcha->checkCaptcha($request->input('captcha'))) {
            return back()
                ->withInput()
                ->with('error', 'Captcha incorrect');
        }

        $ip = $request->ip();
        $email = $request->email;

        if (Ban::where('email', $email)->orWhere('ip', $ip)->exists()) {
            return back()->withErrors(['email' => 'Vous avez été bloqué.']);
        }

        // Enregistrement en base
        Messagerie::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'ip' => $ip,
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

    public function banUser(Request $request)
    {
        $request->validate([
            'email' => 'nullable|email',
            'ip' => 'nullable|ip',
        ]);

        Ban::create([
            'email' => $request->email,
            'ip' => $request->ip,
        ]);

        return back()->with('success', 'Utilisateur bloqué.');
    }
}