<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function store(LoginRequest $request){

        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $token = $request->user()->createToken('oas');
            return response()->json([
                'token' => $token->plainTextToken
            ]);
        }

        return response()->json([
            'message' => "Usuario y/o contraseña inválido"
        ],404);

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
