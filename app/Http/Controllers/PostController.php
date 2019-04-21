<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return Post::where('user_id', auth()->id())->get();
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->description = $request->description;
        $post->user_id = auth()->id();
        $post->save();
        return $post;
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->description = $request->description;
        $post->save();
        return $post;
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
    }
}
