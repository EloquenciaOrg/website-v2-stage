<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogApiController extends Controller
{
    public function index(Request $request)
    {

        // Article à la une
        if ($request->has('featured')) {
            try
            {
                $articles = Blog::where('featured', 1)->get();

                if (!$articles) {
                    return response()->json([
                        'response_code' => 422,
                        'status'        => 'error',
                    ], 422);
                }

                return response()->json(['response_code' => 200, 'status' => 'success','articles' => $articles],200);
            }catch(\Exception $e) { // Ne capture PAS une erreur de type Error (ex: division par 0, appel de méthode inexistante)
                return response()->json([
                    'response_code' => 500,
                    'status'        => 'error',
                    'message'       => 'Internal server error : ' . $e->getMessage()
                ], 500);
            }
            
        }

        // Article unique par ID
        if ($request->has('id')) {
            try {
                $article = Blog::find($request->id); //on peut aussi utiliser $request->query('id') car query c pr get mais le code actuel fonctionne aussi car laravel va chercher partout si on ne precise pas le query
                
                if (!$article) {
                    return response()->json([
                        'response_code' => 422,
                        'status'        => 'error',
                    ], 422);
                }
                
                return response()->json(['response_code' => 200,'status' => 'success','article' => $article]);
            } catch (\Throwable $th) { // Capture TOUT, y compris les erreurs système plus graves
                return response()->json([
                    'response_code' => 500,
                    'status'        => 'error',
                    'message'       => 'Internal server error : ' . $th->getMessage()
                ], 500);
            }
            
        }

        // Les derniers articles (nombre défini par ?last=)
        if ($request->has('last')) {
            try {
                $limit = intval($request->last ?? 5);

                if ($limit <= 0) {
                    return response()->json([
                        'response_code' => 412,
                        'status'        => 'error',
                    ], 412);
                }

                $articles = Blog::orderByDesc('publishdate')->take($limit)->get();

                if (!$articles) {
                    return response()->json([
                        'response_code' => 422,
                        'status'        => 'error',
                    ], 422);
                }

                return response()->json([
                    'response_code' => 200,
                    'status'        => 'success',
                    'articles'      => $articles
                ],200);
            } catch (\Throwable $th) {
                return response()->json([
                    'response_code' => 500,
                    'status'        => 'error',
                    'message'       => 'Internal server error: ' . $th->getMessage()
                ], 500);
            }
        }

        if ($request->has('info'))
        {
            try {
                $count = Blog::count();
                $pages = ceil($count / 5); // fonction PHP qui arrondit un nombre à l’entier supérieur 

                return response()->json([
                    'response_code' => 200,
                    'status' => 'success',
                    'count' => $count,
                    'page' => $pages
                ],200);
            } catch (\Throwable $th) {
                return response()->json([
                    'response_code' => 500,
                    'status'        => 'error',
                    'message'       => 'Internal server error: ' . $th->getMessage()
                ], 500);
            }
        }

        if ($request->has('page')) {
            try {
                $page = intval($request->page);
                $offset = ($page - 1) * 5;

                $blogs = Blog::orderByDesc('publishdate')
                            ->orderByDesc('id')
                            ->offset($offset)
                            ->limit(5)
                            ->get();

                return response()->json($blogs, 200);
            } catch (\Throwable $th) {
                return response()->json([
                    'response_code' => 500,
                    'status'        => 'error',
                    'message'       => 'Internal server error: ' . $th->getMessage()
                ], 500);
            }
        }
    }
}
