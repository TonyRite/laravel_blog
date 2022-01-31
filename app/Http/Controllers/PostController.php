<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return view('posts.index',[
            'posts' => $posts
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,
        ['body'=>'required'
    ]);//dd('posts');

    // post::create(([
    // 'user_id'=>auth()->user()->id(),
    // 'body'=>$request->body
    // ]));

    $request->user()->posts()->create($request->only('body'));
    return back();
    }
}
