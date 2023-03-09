<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class Home extends Controller
{
    public function index(){
        $data = Post::all();
        return view('home', compact('data'));
    }

    public function post(Request $request){
        Post::create([
            'content' => $request ->content,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('home');
    }

    public function editpost(Request $request, $id){
        $data = Post::find($id);
        $data->update($request->all());
        return redirect()->route('home');
    }
}
