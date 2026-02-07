<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Notifications\AddCommentNotification;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Post $post)
    {
        $comments = $post->comments()->latest()->get();

        return view('comments.index', compact('post', 'comments'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function storeComment(Request $request, Post $post)
    {
        $data = $request->validate([
            'comment' => 'required|min:5|max:500',
        ]);

        $post->comments()->create([
            'comment' => $data['comment'],
            'user_id' => auth()->id(),
            'post_id' => $post->id
        ]);

        if ($post->user_id !== auth()->id()) {
            $post->user->notify(new AddCommentNotification($post));
        }

        return back();
    }


    /**
     * Display the specified resource.
     */
    // public function show(Post $post)
    // {

    //     return view('comments.index', compact('post'));
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
