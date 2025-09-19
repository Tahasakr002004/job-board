<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    public function index()
    {
         $data = Comment::paginate(10);
        return view('comment.index', ['comments' => $data,"pageTitle"=> "comments", "tabTitle" => "comment"]);
    }



    public function create()
    {
        $post = \App\Models\Post::first(); 
        Comment::factory()->count(5)->create([
            'post_id' => $post->id
        ]);

         return response("successful Creation", 201);
    }

    
    public function store(Request $request)
    {
    }

   
    public function show(string $id)
    {
       
    }

    public function edit(string $id)
    {
        $comment = Comment::findOrFail($id);
        return view("comment.edit", ["comment"=> $comment,"pageTitle"=> "comments", "tabTitle" => "edit-comment"]);
    }

    public function update(Request $request, string $id)
    {
    }

    public function destroy(string $id)
    {
    }
}
