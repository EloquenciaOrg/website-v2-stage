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
            'password' => 'required|confirmed',
        ]);

        $id = $request->id;
        
        $admin = Admin::find($id);
        $admin->password = Hash::make($request->password);
        $admin->save();

        return back()->with('success', 'Mot de passe mis à jour');
    }
}
