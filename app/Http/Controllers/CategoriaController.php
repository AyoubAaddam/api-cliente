<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class CategoriaController extends Controller
{
    public function index()
    {
        $token = session('user_token');

        $response = Http::withToken($token)
                        ->get(env('API_URL').'/api/categorias');
/*
        $categorias = $response->json();*/

 $responseData = $response->json();

        // Check if 'data' is present and is an array
        if (isset($responseData['data']) && is_array($responseData['data'])) {
            $categorias = $responseData['data'];
        } else {
            $categorias = [];  // Default to an empty array if 'data' is not an array
        }

        return view('ProvedoresIndex', compact('categorias'));
    }

    public function store(Request $request)
    {
        $token = session('user_token');

        $cat_nom = is_string($request->input('cat_nom')) ? $request->input('cat_nom') : '';
$cat_obs = is_string($request->input('cat_obs')) ? $request->input('cat_obs') : '';

$response = Http::withToken($token)
    ->post(env('API_URL').'/api/categorias', [
        'cat_nom' => $cat_nom,
        'cat_obs' => $cat_obs
    ]);



                        if ($response->successful()) {
                            return redirect()->route('categorias.index')->with('success', $response->json()['data']); // Aquí modificamos para acceder al mensaje de éxito
                        } else {
                            return redirect()->route('categorias.index')->with('error', $response->json()['data']); // Aquí modificamos para acceder al mensaje de error
                        }
    }

    public function update(Request $request)
    {
        $token = session('user_token');

        $id=$request->id;

        $response = Http::withToken($token)
                        ->put(env('API_URL').'/api/categorias/'.$id, $request->all());

                        if ($response->successful()) {
                            return redirect()->route('categorias.index')->with('success', $response->json()['data']); // Aquí modificamos para acceder al mensaje de éxito
                        } else {
                            return redirect()->route('categorias.index')->with('error', $response->json()['data']); // Aquí modificamos para acceder al mensaje de error
                        }
    }

    public function delete(Request $request)
    {
        $token = session('user_token');

        $id=$request->id;

        $response = Http::withToken($token)
                        ->delete(env('API_URL').'/api/categorias/'.$id);

                        if ($response->successful()) {
                            return redirect()->route('categorias.index')->with('success', $response->json()['data']); // Aquí modificamos para acceder al mensaje de éxito
                        } else {
                            return redirect()->route('categorias.index')->with('error', $response->json()['data']); // Aquí modificamos para acceder al mensaje de error
                        }
    }


}
