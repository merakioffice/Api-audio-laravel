<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use Illuminate\Http\Request;

class AudioListController extends Controller
{
    public function index(Request $request){
        $audios = Audio::where('user_id', auth()->user()->id)->get();

        return $audios;
    }
}
