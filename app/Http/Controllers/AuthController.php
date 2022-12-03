<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    

    public function login(Request $request) {
        

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credentials =$request->only('email', 'password');


        if (!Auth::attempt($credentials)) {
            return response([
                'message' => 'Credenciales incorrectas.'
            ], 403);
        }

        return response([
            'user' =>  $request->user(),
            'token' => $request->user()->createToken('secret')->plainTextToken
        ], 200);


        // return view('account',['user'=>$request->user()]);

    }
}

  