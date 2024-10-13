<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function storeComment(Request $request, $id)
    {
        // dd($request->all());

       
        $request->validate([
            'content' => 'required|string', 
        ]);

        
        Comment::create([
            'shoe_id' => $id, 
            'user_id' => session('user.id_user'), 
            'content' => $request->input('content'), 
        ]);

      
        return redirect()->route('client.shop-single', $id);
    }
}