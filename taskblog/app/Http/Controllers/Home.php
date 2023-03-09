<?php

namespace App\Http\Controllers;
use App\Models\Post;

class Home extends Controller
{
    public function index(){
        $data = Post::all();
        return view('home', compact('data'));
    }
}
