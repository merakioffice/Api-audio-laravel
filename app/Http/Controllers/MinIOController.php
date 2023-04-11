<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MinIOController extends Controller
{
    public function store(Request $request)
    {

        $filename = $request->audio->getClientOriginalName();

        $name_File = str_replace(" ", "_", $filename);

        $user_id = auth()->user()->id;

        $path = $request->file('audio')->store('audios', 's3');

        $ruta = "$name_File/$path";

        $audio = Audio::create([
            'name' => $name_File,
            'minio_id' => $path,
            'user_id' => $user_id,
        ]);

        return response()->json([
            'data' => $audio,
            'file' => Storage::disk('s3')->temporaryUrl(
                $path,
                now()->addMinutes(5)
            )
        ]);
    }
}
