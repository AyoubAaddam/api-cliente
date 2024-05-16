<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    //
    public function index(){
        return view('register');
    }
    public function register(Request $request){

        $data=$request->validate([
            'name'=>'string|required',
            'email'=>'string|required',
            'password'=>'string|required',
        ]);

        $response = Http::post(env('API_URL').'/api/register', $data);
        if($response->successful()) {
            return Redirect::route('login.index')->with('success', $response->json());
        }

        return Redirect::route('register.index')->with('error', $response->json());

    }
}
