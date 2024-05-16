<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductProvider;
use Illuminate\Support\Facades\Http;

class ProductoCategoriaController extends Controller
{
    public function index()
    {
        $token = session('user_token');

        $response = Http::withToken($token)
                        ->get(env('API_URL').'/api/productos-categoria');

        $ProductoCategoriar = $response->json()['data'];

        return view('products-providers.index', compact('ProductoCategoriar'));
    }

    public function store(Request $request)
    {
        $token = session('user_token');

        $response = Http::withToken($token)
                        ->post(env('API_URL').'/api/productos-categoria', $request->all());

        return $this->handleResponse($response);
    }

    public function update(Request $request, $id)
    {
        $token = session('user_token');

        $response = Http::withToken($token)
                        ->put(env('API_URL').'/api/productos-categoria/'.$id, $request->all());

        return $this->handleResponse($response);
    }

    public function delete(Request $request, $id)
    {
        $token = session('user_token');

        $response = Http::withToken($token)
                        ->delete(env('API_URL').'/api/productos-categoria/'.$id);

        return $this->handleResponse($response);
    }

    private function handleResponse($response)
    {
        if ($response->successful()) {
            return redirect()->route('productos-categoria.index')->with('success', $response->json());
        } else {
            return redirect()->route('productos-categoria.index')->with('error', $response->json());
        }
    }
}
