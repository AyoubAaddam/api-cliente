<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    function login(){
        return view('auth.login');
    }

    function register(){
        $token=session('token');
        $response=Http::withToken($token)->
            get(env('API_URL').'/api/api/register');

            $data=json_decode($response->body(),true);
            $data=$data['data'];

        return view('dashboard',[
            'data'=>$data
        ]);
    }

    /* POST            api/api/login ................................................. Api\AuthController@login
  POST            api/api/register ........................................... Api\AuthController@register*/

    public function auth(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required',
            ]);

            $validated = $validator->validated();

            $response = Http::post(env('API_URL').'/api/api/login', [
                'email' => $validated['email'],
                'password' => $validated['password'],
            ]);

            $user = json_decode($response)->content->name;

            $token = $response->json('token');

            session(['name' => $user]);
            session(['token' => $token]);
            session()->save();

            return redirect('/dashboard');
        } catch (\Throwable $th) {
            //return back()->with('error',$th->getMessage());
        }
    }
}
