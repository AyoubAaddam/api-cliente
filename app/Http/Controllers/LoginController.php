<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    //
    public function index(){
        return view('login');
    }
    public function auth(Request $request){

        $response = Http::post(env('API_URL').'/api/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);
        if($response->successful()) {

            $response = $response->json();
            $token = $response['token'];
            session(['user_token' => $token]);


            return Redirect::route('main.index');
        }

        return Redirect::route('login.index')->with('error', $response->json());

    }
}


