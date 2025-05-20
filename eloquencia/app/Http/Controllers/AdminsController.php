<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Services\Captcha;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admin.gestion_admins', compact('admins'));
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
        
        $admin = Admin::find($id);
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

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate(); // Sécurise la session
            return redirect()->intended('/admin/admin');
        }

        // Sinon : mauvais identifiants
        return back()
            ->withInput()
            ->withErrors(['email' => 'Email ou mot de passe incorrect.']);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout(); // Déconnecte l'admin

        $request->session()->invalidate(); // Invalide la session actuelle
        $request->session()->regenerateToken(); // Regénère le token CSRF

        return redirect()->route('login_admin'); // Redirige vers la page de login admin
    }
}
