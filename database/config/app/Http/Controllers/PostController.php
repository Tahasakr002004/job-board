<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Get all data from model Post
    public function index()
    {
        $data = Post::cursorPaginate(5);

        return view('post.index', ['posts' => $data,'pageTitle' => 'Blogs-Page', 'tabTitle' => 'blog']);
    }
     public function createPosts()
    {
        

        Post::factory(10)->create();
        return response('Successful Creation', 201);
    }


    public function showPosts($id){
        $post = POST::findOrFail($id);
        return view('post.show',
         data: ['post' => $post, 
         'pageTitle' => $post->pageTitle ,
         'tabTitle'=> 'show-post']);
    }


    public function deletePosts($id){
        Post::destroy($id);
        return response('successfully Deleted',204);
    }
}
