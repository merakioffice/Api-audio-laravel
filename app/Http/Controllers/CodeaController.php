<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Audios;


class CodeaController extends Controller
{

    public function audio(Request $request){

        $audio = new Audios;

        $filename = $request->audio->getClientOriginalName();
        $name_File = str_replace(" ", "_", $filename);

        $audio->nombre = $name_File;

        $request->audio->storeAs('audios', $name_File);

        $audio->save();

        return $request;
    }


    public function store(){

    }

}
