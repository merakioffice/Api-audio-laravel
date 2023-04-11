<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AudioController extends Controller
{

    public function audio(Request $request){

        $audio = new Audio;

        $filename = $request->audio->getClientOriginalName();

        $name_File = str_replace(" ", "_", $filename);

        $audio->name = "audios/$name_File";

        $audio->user_id = auth()->user()->id;

        $audio->minio_id = auth()->user();

        $request->audio->storeAs('audios', $name_File);

        $audio->save();

        $contents = Storage::get($audio->name);

        return $audio;
    }


    public function store(){

    }

}
