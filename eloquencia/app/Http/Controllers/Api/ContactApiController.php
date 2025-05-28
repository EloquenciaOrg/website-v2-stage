<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactApiController extends Controller
{
    public function store(Request $request)
    {
        // Validation des champs
        try {
            $request->validate([
                'name' => 'required|max:40',
                'email' => 'required|email|max:60',
                'message' => 'required',
                'cgu' => 'accepted'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'response_code' => 412,
                'status'        => 'error'
            ], 412);
        }
        

        $ip = $request->ip();
        $email = $request->email;

        try {
            if (Ban::where('email', $email)->orWhere('ip', $ip)->exists()) {
                return response()->json(['response_code' => 405,'status' => 'error', 'message' => 'Bloqué.'], 405);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'response_code' => 500,
                'status'        => 'error',
                'message'       => 'Internal server error: ' . $th->getMessage()
            ], 500);
        }
        
        try {
            // Enregistrement en base
            Messagerie::create([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
                'ip' => $ip,
            ]);

            // Redirection avec message de succès
            return response()->json(['response_code' => 201,'status' => 'success'], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'response_code' => 500,
                'status'        => 'error',
                'message'       => 'Internal server error: ' . $th->getMessage()
            ], 500);
        }
        
    }

}
