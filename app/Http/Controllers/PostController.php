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

        $data = [
            'username' => strtoupper($post->user->name),
            'id' => $post->id,
            'post' => $post->post,
            'date' => $post->created_at->format('F d, Y h:i'),
        ];

        return response()->json($data);
    }

    public function destroy(Post $post)
    {
        Post::destroy($post->id);

        return response()->json('success');
    }
}
