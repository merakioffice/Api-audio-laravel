<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Audios;


class AudioController extends Controller
{

    public function audio(Request $request){

        $audio = new Audios;

        $filename = $request->audio->getClientOriginalName();
        $name_File = str_replace(" ", "_", $filename);

        $audio->name = "audios/$name_File";

        $audio->user_id = auth()->user()->id;

        $request->audio->storeAs('audios', $name_File);

        $audio->save();

        /* $contents = Storage::get('audios/canserb_ero.mp3');
 */

        return $audio;
    }


    public function store(){

    }

}
