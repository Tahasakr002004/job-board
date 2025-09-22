<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
use App\Models\Post;
use Illuminate\Http\Request;




class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Post::latest()->paginate(10);

        return view('post.index', ['posts' => $data,'pageTitle' => 'Blogs-Page', 'tabTitle' => 'blog']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
          return view('post.create', ['pageTitle' => 'create-Page', 'tabTitle' => 'create']);
    }



    /**
     * Display the specified resource.
     */
    public function store(BlogPostRequest $request){
        $validated = $request->validated();
        $post = Post::create($validated);

        return redirect('/blog')->with('success','Post is  successfully created');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // this function is just return view the page of form to edit - redirect to update function
        $data = Post::findOrFail($id);
        return view('post.edit', ['post' => $data,'pageTitle' => 'Edit', 'tabTitle' => 'edit']);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogPostRequest $request, string $id)
    {
        //@TODO: This will be completed in Forms
        // this function is about modifying and processesing the editing
       $validated = $request->validated();
       $post = Post::findOrFail($id);
       $post->update($validated);
       return redirect('/blog')->with('success','The Post is successfully updated');


    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id){

        $post = Post::findOrFail($id); // throws 404 if not found
        $post->delete();

        return redirect('/blog')
            ->with('success', 'Post deleted successfully.');
    }

    public function show(string $id){
        $post = Post::findOrFail($id);
        return view('post.show', ['post'=> $post]);
    }

}
