<?php

namespace App\Http\Controllers;

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
        $data = Post::cursorPaginate(5);

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
    public function store(Request $request)
    {
        //@TODO: This will be completed in Forms
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
         $post = POST::findOrFail($id);
        return view('post.show',
         data: ['post' => $post, 
         'pageTitle' => $post->pageTitle ,
          'tabTitle'=> 'show-post']);
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
