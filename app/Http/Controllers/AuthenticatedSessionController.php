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

        if ( ! Auth::attempt($credentials, $request->only('email', 'password'))){
            throw ValidationException::withMessages([
                'email'=> 'Estas Credenciales no coinciden!'
            ]);
        }

        return json_encode(Auth::user());

    }

    public function destroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return 'register secces';
    }
}
