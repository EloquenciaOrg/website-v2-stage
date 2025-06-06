<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use App\Models\Member;

class AuthenticationController extends Controller
{
    /**
     * Login and return auth token.
     */
    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email'    => 'required|string',
                'password' => 'required|string',
            ]);

            if(false) // MISE EN COMMENTAIRE
            {
                // Récupérer le membre correspondant à l'email
                $member = Member::where('email', $credentials['email'])->first();

                // Vérifier l'existence et le mot de passe
                if (!$member || $credentials['password'] !== $member->password) {
                    // Échec de connexion
                    return response()->json([
                        'response_code' => 403,
                        'status'        => 'forbidden',
                    ], 403);
                }
            }
            
            
            
            if (!Auth::guard('member')->attempt($credentials)) {
                return response()->json([
                    'response_code' => 403,
                    'status'        => 'forbidden',
                ], 403);
            }
            

            $user = Auth::guard('member')->user();
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'response_code' => 200,
                'status'        => 'success',
                'user_info'     => [
                    'id'    => $user->id,
                    'first_name' => $user->first_name,
                    'name'  => $user->name,
                    'email' => $user->email,
                ],
                'token'       => $token,
                'token_type'  => 'Bearer',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'response_code' => 422,
                'status'        => 'error',
                'message'       => 'Validation failed',
                'errors'        => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            Log::error('Login Error: ' . $e->getMessage());

            return response()->json([
                'response_code' => 500,
                'status'        => 'error',
            ], 500);
        }
    }

    /**
     * Get list of users (paginated) — protected route.
     */
    public function userInfo()
    {
        try {
            $users = Member::orderBy('id', 'desc')->paginate(10);

            return response()->json([
                'response_code'  => 200,
                'status'         => 'success',
                'data_user_list' => $users,
            ]);
        } catch (\Exception $e) {
            Log::error('User List Error: ' . $e->getMessage());

            return response()->json([
                'response_code' => 500,
                'status'        => 'error',
                'message'       => 'Failed to fetch user list',
            ], 500);
        }
    }

    /**
     * Logout user and revoke tokens — protected route.
     */
    public function logOut(Request $request)
    {
        try {
            $user = $request->user();

            if ($user) {
                $user->tokens()->delete();

                return response()->json([
                    'response_code' => 200,
                    'status'        => 'success',
                    'message'       => 'Successfully logged out',
                ]);
            }

            return response()->json([
                'response_code' => 401,
                'status'        => 'error',
                'message'       => 'User not authenticated',
            ], 401);
        } catch (\Exception $e) {
            Log::error('Logout Error: ' . $e->getMessage());

            return response()->json([
                'response_code' => 500,
                'status'        => 'error',
                'message'       => 'An error occurred during logout',
            ], 500);
        }
    }
}