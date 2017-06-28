<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $posts = Post::latest()
            ->
            filter(request(['month', 'year']))
            ->
            get();
        return view('posts.index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {

        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        // Create a new post
//        $post = new Post;
//        $post->title = request('title');
//        $post->body = request('body');

        // Save in database
//        $post->save();
        $this->validate(request(), [
            'title' => 'required|min:5|max:10',
            'body' => 'required|min:5'
        ]);

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

//        Post::create([
//            'title'=>request('title'),
//            'body'=>request('body'),
//            'user_id'=>auth()->id()
//
//        ]);

        return redirect('/');

    }
}
