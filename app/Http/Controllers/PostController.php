<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::latest()->with(['user', 'likes'])->paginate(10); // paginate
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request)
    {
        //dd('post');
        $this->validate($request, [
            'body' => 'required'
        ]);

        // creating a post
        auth()->user()->posts()->create($request->only('body'));

//        Post::create([
//            'user_id'=>auth()->id(),
//            'body'=>$request->body
//        ]);
        return back();
    }

    public function show(Post $post)
    {
        return view("posts.show", [
           'post' =>$post
        ]);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete',$post);
        $post->delete();
        return back();
    }
}
