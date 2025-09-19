<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    
      // Get all data from model comment
    public function index()
    {
        $data = Comment::all();
        return view('comment.index', ['comments' => $data,"pageTitle"=> "comments", "tabTitle" => "comment"]);
    }


    public function createComment()
  {
    // Create 5 fake comments for post_id = 10
    \App\Models\Comment::factory()->count(5)->create([
        'post_id' => 10
    ]);

    return redirect('/comments');
  }


  
}
