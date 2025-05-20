<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Hash;
use App\Services\Captcha;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('admin.members', compact('members'));
    }

    public function index_change_password(Request $request)
    {
        $token = $request->query('reset');
        $member = Member::where('reset', $token)->first();
        return view('admin.change_password', compact('member'));
    }

    public function updateEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|confirmed',
        ]);

        $id = $request->id;
        
        $member = Member::find($id);
        $member->email = $request->email;
        $member->save();

        return back()->with('success', 'Mot de passe mis à jour');
    }

    public function reset(Request $request)
    {
        $member = Member::findOrFail($request->ID);
        // Générer un token aléatoire à 6 chiffres
        $token = random_int(100000, 999999);

        // Mettre à jour la colonne `reset`
        $member->reset = $token;
        $member->save();

        Mail::to($member->email)->send(new ResetPasswordMail($member));

        return back()->with('success', 'Email de réinitialisation envoyé.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => [
                'required',
                'string',
                'min:12', // Longueur minimale
                'regex:/[a-z]/',      // au moins une minuscule
                'regex:/[A-Z]/',      // au moins une majuscule
                'regex:/[0-9]/',      // au moins un chiffre
                'regex:/[\W_]/',      // au moins un caractère spécial
                'confirmed'],
            ], [
            'password.regex' => 'Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial.',
            'password.min' => 'Le mot de passe doit faire au moins 12 caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',]
        );

        $id = $request->id;
        
        $admin = Member::find($id);
        $admin->password = Hash::make($request->password);
        $admin->save();

        return back()->with('success', 'Mot de passe mis à jour');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:60',
            'password' => 'required',
            'captcha' => 'required'
        ]);

        $captcha = new Captcha();
        if (!$captcha->checkCaptcha($request->input('captcha'))) {
            return back()
                ->withInput()
                ->with('error', 'Captcha incorrect');
        }

        // Vérification des identifiants
        $credentials = $request->only('email', 'password');

        if (Auth::guard('member')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate(); // Sécurise la session
            return redirect()->intended('/lms'); // charge directement la vue lms.blade.php
        }

        // Sinon : mauvais identifiants
        return back()
            ->withInput()
            ->withErrors(['email' => 'Email ou mot de passe incorrect.']);
    }

    public function logout(Request $request)
    {
        Auth::guard('member')->logout();

        $request->session()->invalidate(); // Invalide la session actuelle
        $request->session()->regenerateToken(); // Regénère le token CSRF

        return redirect()->route('login'); // Redirige vers la page de login 
    }

}
