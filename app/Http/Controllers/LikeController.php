<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Notifications\PostLikedNotification;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggleLike(Post $post, Request $request)
    {
        $like = Like::where('user_id', auth()->id())
            ->where('post_id', $post->id)
            ->first();
        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'user_id' => auth()->id(),
                'post_id' => $post->id
            ]);
            if ($post->user_id !== auth()->id()) {
                $post->user->notify(new PostLikedNotification($post));
            }
        }
        return back();
    }
}
