<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reduction;
use App\Models\Code;
use App\Models\Ban;
use Illuminate\Support\Facades\Mail;
use App\Mail\AcceptReductionMail;
use App\Mail\DenyReductionMail;
use App\Services\Captcha;
use Illuminate\Support\Facades\Storage;



class ReductionController extends Controller
{
    public function index()
    {
        $reductions = Reduction::where('state', 0)->get();
        $historique = Reduction::whereIn('state', [1, 2])->get();
        return view('admin.gestion_reduction', compact('reductions','historique'));
    }

    public function demande_reduction(Request $request)
    {
        // Validation des champs
        $request->validate([
            'name' => 'required|string|max:60',
            'email' => 'required|email|max:60',
            'file' => 'required|file|mimetypes:application/pdf,image/jpeg,image/png',
            'captcha' => 'required|max:60',
            'cgu' => 'accepted'
        ]);

        $captcha = new Captcha();
        if (!$captcha->checkCaptcha($request->input('captcha'))) {
            return back()
                ->withInput()
                ->with('error', 'Captcha incorrect');
        }

        $realMime = mime_content_type($request->file('file')->getPathname());
        $allowed = ['application/pdf', 'image/jpeg', 'image/png'];
        if (!in_array($realMime, $allowed)) {
            return back()->withErrors(['file' => 'Format de fichier non autorisé.']);
        }

        // Vérification du bannissement
        $ip = $request->ip();
        $email = $request->email;

        if (Ban::where('email', $email)->orWhere('ip', $ip)->exists()) {
            return back()->withErrors(['email' => 'Vous avez été bloqué et ne pouvez pas envoyer de demande.']);
        }

        // Récupération du contenu binaire du fichier
        $fileContent = file_get_contents($request->file('file')->getRealPath());

        // Création de l'enregistrement dans la BDD
        Reduction::create([
            'name' => $request->name,
            'email' => $request->email,
            'proof' => $fileContent, // Enregistrement en BLOB
            'ip' => $ip,
        ]);

        // Redirection avec message de succès
        return back()->with('success', 'Votre demande a bien été envoyée.');
    }

    public function downloadProof($id)
    {
        $reduction = Reduction::findOrFail($id);
        $fileContent = $reduction->proof;

        // Détecter dynamiquement le type MIME
        $finfo = finfo_open();
        $mimeType = finfo_buffer($finfo, $fileContent, FILEINFO_MIME_TYPE);
        finfo_close($finfo);

        // Extraire l’extension depuis le MIME
        $extension = explode('/', $mimeType)[1] ?? 'bin';

        return response($fileContent)
            ->header('Content-Type', $mimeType)
            ->header('Content-Disposition', 'attachment; filename="justificatif_'.$reduction->name.'.'.$extension.'"');
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

        $code = Code::whereNull('email')->first();
        if (!$code) {
            return back()->with('error', 'Aucun code disponible.');
        }
        $code->email = $demandeur->email;
        $code->save();

        Mail::to($demandeur->email)->send(new AcceptReductionMail($demandeur, $code));

        return back()->with('success', 'Email de validation de reduction envoyé.');
    }

    public function ban(Request $request)
    {
        Ban::create([
            'email' => $request->email,
            'ip' => $request->ip,
        ]);

        return back()->with('success', 'Utilisateur bloqué avec succès.');
    }
}
