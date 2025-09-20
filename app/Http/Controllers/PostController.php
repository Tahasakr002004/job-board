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
     * Store a newly created resource in storage.
     */
   


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
        //
        return view('post.edit', ['pageTitle' => 'edit-Page', 'tabTitle' => 'edit']);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //@TODO: This will be completed in Forms


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //@TODO: This will be completed in Forms
    }
}
