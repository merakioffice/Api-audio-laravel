<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CodeaController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function audio(Request $request){
        return 'user';
    }

    public function store(){

    }

}
