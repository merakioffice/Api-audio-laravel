<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteAudioController extends Controller
{
    public function delete(Request $request, $id){

       $audio = Audio::where('user_id', auth()->user()->id)->get('minio_id');

        $audio_delete = Audio::where(['user_id'=> auth()->user()->id, 'id'=>$id])->delete();

        $url = $audio[0]->minio_id;

        $disk = Storage::disk('s3')->delete($url);

        return "delete file name: $url";
    }
}
