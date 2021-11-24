<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth']);
    }

// insert likes
    public function store(Post $post, Request $request) // root model binding
    {
        if ($post->likedBy($request->user())) {
            return response(null, 409);
        }
        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);
        return back();
    }

    // Delete Likes
    public function destroy(Post $post, Request $request)
    {
        $request->user()->likes()->where('post_id', $post->id)->delete();
        return back();
    }
}
