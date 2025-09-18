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
       Comment::create([
            'author'=> "taha",
            'content' => "this is a test comment",
            'post_id' => 10     
            ]);
        

        return redirect( to:'/comments');
    }


  
}
