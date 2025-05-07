<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;



use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('gestion_admins', compact('admins'));
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
}
