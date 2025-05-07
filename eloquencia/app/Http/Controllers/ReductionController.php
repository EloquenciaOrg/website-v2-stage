<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reduction;
use Illuminate\Support\Facades\Mail;
use App\Mail\AcceptReductionMail;
use App\Mail\DenyReductionMail;


class ReductionController extends Controller
{
    public function index()
    {
        $reductions = Reduction::where('state', 0)->get();
        $historique = Reduction::whereIn('state', [1, 2])->get();
        return view('gestion_reduction', compact('reductions','historique'));
    }

    public function demande_reduction(Request $request)
    {
        // Validation des champs
        $request->validate([
            'name' => 'required|string|max:60',
            'email' => 'required|email|max:60',
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf'
        ]);

        // Récupération du contenu binaire du fichier
        $fileContent = file_get_contents($request->file('file')->getRealPath());

        // Création de l'enregistrement dans la BDD
        Reduction::create([
            'name' => $request->name,
            'email' => $request->email,
            'proof' => $fileContent, // Enregistrement en BLOB
        ]);

        // Redirection avec message de succès
        return back()->with('success', 'Votre demande a bien été envoyée.');
    }

    public function downloadProof($id)
    {
        $reduction = Reduction::findOrFail($id);

        return response($reduction->proof)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="justificatif_'.$id.'.pdf"');
    }

    public function reduction_refuse(Request $request)
    {
        $demandeur = Reduction::findOrFail($request->id);
        $demandeur->state = 2;
        $demandeur->save();

        Mail::to($demandeur->email)->send(new DenyReductionMail($demandeur));

        return back()->with('success', 'Email de refus de reduction envoyé.');
    }

    public function reduction_accepte(Request $request)
    {
        $demandeur = Reduction::findOrFail($request->id);
        $demandeur->state = 1;
        $demandeur->save();

        Mail::to($demandeur->email)->send(new AcceptReductionMail($demandeur));

        return back()->with('success', 'Email de validation de reduction envoyé.');
    }
}
