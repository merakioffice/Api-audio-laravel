<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EditRequest;

class EditUsersController extends Controller
{
    public function edit(EditRequest $request,$id_user){

        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json([
            'user' => $user
        ]);

    }
}
