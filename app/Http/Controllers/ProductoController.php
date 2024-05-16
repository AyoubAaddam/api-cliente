<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class ProductoController extends Controller
{
    public function index()
    {
        $token = session('user_token');

        $response = Http::withToken($token)->get(env('API_URL').'/api/productos');

        $responseData = $response->json();

        // Check if 'data' is present and is an array
        if (isset($responseData['data']) && is_array($responseData['data'])) {
            $products = $responseData['data'];
        } else {
            $products = [];  // Default to an empty array if 'data' is not an array
        }

        return view('ProductosIndex', compact('products'));
    }

    public function store(Request $request)
    {
        $token = session('user_token');
        $pord_nom = is_string($request->input('pord_nom')) ? $request->input('pord_nom') : '';
$pord_obs = is_string($request->input('pord_obs')) ? $request->input('pord_obs') : '';

$response = Http::withToken($token)
    ->post(env('API_URL').'/api/productos', [
        'pord_nom' => $pord_nom,
        'pord_obs' => $pord_obs
    ]);





        /*$response = Http::withToken($token)
        ->post(env('API_URL').'/api/productos', [
            'pord_nom' => $request->input('pord_nom'),
            'pord_obs' => $request->input('pord_obs')
        ]);*/

        if ($response->successful()) {
            return redirect()->route('productos.index')->with('success', $response->json()['data']); // Aquí modificamos para acceder al mensaje de éxito
        } else {
            return redirect()->route('productos.index')->with('error', $response->json()['data']); // Aquí modificamos para acceder al mensaje de error
        }
    }

    public function update(Request $request)
    {
        $token = session('user_token');
        //dd($request);

        $id=$request->id;



        $response = Http::withToken($token)
        ->put(env('API_URL').'/api/productos/'.$id, $request->all());


        if ($response->successful()) {
            return redirect()->route('productos.index')->with('success', $response->json()['data']); // Aquí modificamos para acceder al mensaje de éxito
        } else {
            return redirect()->route('productos.index')->with('error', $response->json()['data']); // Aquí modificamos para acceder al mensaje de error
        }
    }

    public function delete(Request $request)   {
        $token = session('user_token');

        $id=$request->id;
        $response = Http::withToken($token)
                        ->delete(env('API_URL').'/api/productos/'.$id);


             if ($response->successful()) {
                    return redirect()->route('productos.index')->with('success', $response->json()['data']); // Aquí modificamos para acceder al mensaje de éxito
             } else {
                            return redirect()->route('productos.index')->with('error', $response->json()['data']); // Aquí modificamos para acceder al mensaje de error
             }
    }


}
