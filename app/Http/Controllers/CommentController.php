<?php


namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Http\Requests\CommentPostRequest;

class CommentController extends Controller
{
   public function store(CommentPostRequest $request, Post $post)
    {
        $comment = new Comment();
        $comment->author = $request->author;
        $comment->content = $request->content;
        $comment->post_id = $post->id;
        $comment->save();

        // Redirect back to the same blog post page
        return redirect("/blog/{$post->id}")
                         ->with('success', 'Comment successfully added.');
        // dd($post); 
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted.');
    }

    // Other methods can redirect to blog index
    public function index() { return redirect('/blog'); }
    public function create() { return redirect('/blog'); }
    public function show($id) { return redirect('/blog'); }
    public function edit($id) { return redirect('/blog'); }
    public function update(Request $request, $id) { return redirect('/blog'); }
}
