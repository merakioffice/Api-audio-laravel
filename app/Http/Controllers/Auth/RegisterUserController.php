<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditRequest;
use App\Models\User;

class RegisterUserController extends Controller
{
    public function store(EditRequest $request){
            $request->validated();

        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
        ]);

        return response()->json([
            'message' => 'usuario creado',
            'data' => $user
        ]);

    }

}
