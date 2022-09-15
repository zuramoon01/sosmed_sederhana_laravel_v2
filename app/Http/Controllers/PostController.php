<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(Request $request)
    {
        $post = Post::create([
            'user_id' => auth()->user()->id,
            'post' => $request->post
        ]);

        return response()->json($post);
    }
}
