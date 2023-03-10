<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class Home extends Controller
{
    public function index(){
        $data = Post::orderBy('created_at', 'desc')->paginate(3);
        return view('home', compact('data'));
    }

    public function post(Request $request){
        $this->validate($request, [
            'content' => 'required',
        ]);
        Post::create([
            'content' => $request ->content,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('home');
    }

    public function comment(Request $request, $id){
        $this->validate($request, [
            'comment' => 'required',
        ]);
        Comment::create([
            'comment' => $request ->comment,
            'user_id' => Auth::user()->id,
            'post_id' => $id,
        ]);
        return redirect()->route('home');
    }

    public function editpost(Request $request, $id){
        $this->validate($request, [
            'content' => 'required',
        ]);
        $data = Post::find($id);
        $data->update($request->all());
        return redirect()->route('home');
    }

    public function editcomment(Request $request, $id){
        $this->validate($request, [
            'comment' => 'required',
        ]);
        $data = Comment::find($id);
        $data->update($request->all());
        return redirect()->route('home');
    }

    public function deletepost($id){
        $data = Post::find($id);
        $data->delete();
        return redirect()->route('home');
    }

    public function deletecomment($id){
        $data = Comment::find($id);
        $data->delete();
        return redirect()->route('home');
    }
}
