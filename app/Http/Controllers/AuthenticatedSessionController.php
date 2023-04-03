<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request){

        $credentials = $request->validate([
            'email' =>['required', 'string', 'email'],
            'password' =>['required', 'string'],
        ]);

        if (Auth::attempt($credentials)) {
            $token = $request->user()->createToken('oas');

            return response()->json([
                'token' => $token->plainTextToken
            ]);
        }

        return response()->json("Usuario y/o contraseña inválido");

    }

    public function destroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return 'register secces';
    }

    public function me(Request $request)
    {
        return response()->json(auth()->user());
    }
}
