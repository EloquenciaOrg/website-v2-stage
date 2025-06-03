<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Ban;
use \App\Models\Reduction;

class ReductionApiController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Validation
            $request->validate([
                'name' => 'required|string|max:60',
                'email' => 'required|string|max:60',
                'file' => 'required|image',
            ]);
            
        } catch (\Throwable $th) {
            return response()->json([
                'response_code' => 412,
                'status'        => 'error',
            ], 412);
        }

        try {
            // Sécurité MIME réelle
            $realMime = mime_content_type($request->file('file')->getPathname());
            $allowed = ['application/pdf', 'image/jpeg', 'image/png'];
            if (!in_array($realMime, $allowed)) {
                return response()->json(['response_code' => 415,'status' => 'error', 'message' => 'Fichier non autorisé'], 415);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'response_code' => 500,
                'status'        => 'error',
                'message'       => 'Internal server error: ' . $th->getMessage()
            ], 500);
        }
        

        // Anti-spam
        $ip = $request->ip();
        $email = $request->email;

        try {
            if (Ban::where('email', $email)->orWhere('ip', $ip)->exists()) {
                return response()->json(['response_code' => 403,'status' => 'error', 'message' => 'Bloqué.'], 403);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'response_code' => 500,
                'status'        => 'error',
                'message'       => 'Internal server error: ' . $th->getMessage()
            ], 500);
        }
        

        try {
            // Fichier BLOB
            $fileContent = file_get_contents($request->file('file')->getRealPath());

            Reduction::create([
                'name' => $request->name,
                'email' => $request->email,
                'proof' => $fileContent,
                'ip' => $ip,
            ]);

            return response()->json(['response_code' => 201,'status' => 'created'], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'response_code' => 500,
                'status'        => 'error',
                'message'       => 'Internal server error: ' . $th->getMessage()
            ], 500);
        }
        

    }
}
