<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;

class CommentAdminController extends Controller
{
    public function index()
    {
        $admin = User::where('role', 'admin')->first();

        $comments = Comment::with(['shoe', 'user'])->paginate(10);
        // dd($comments);

        return view('admin.comments.index', compact('admin', 'comments'));
    }

    public function show(Comment $comment)
    {
        $admin = User::where('role', 'admin')->first();

        return view('admin.comments.show', compact('comment', 'admin'));

    }

    public function hide(Comment $comment)
    {
        try {

            $comment->update(['active' => 0]);

            return back()->with('success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function restore(Comment $comment)
    {
        try {

            $comment->update(['active' => 1]);

            return back()->with('success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}