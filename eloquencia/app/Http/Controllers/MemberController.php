<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Hash;



use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('members', compact('members'));
    }

    public function index_change_password(Request $request)
    {
        $token = $request->query('reset');
        $member = Member::where('reset', $token)->first();
        return view('change_password', compact('member'));
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
            'password' => 'required|confirmed',
        ]);

        $id = $request->id;
        
        $admin = Member::find($id);
        $admin->password = Hash::make($request->password);
        $admin->save();

        return back()->with('success', 'Mot de passe mis à jour');
    }
}
