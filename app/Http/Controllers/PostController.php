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
        //   $posts =  Post::create([
        //         'title'     => "Dummy Post New",
        //         'body'      => "This is the body of dummy post.",
        //         'author'    => "Author",
        //         'published' => rand(0, 1), // 0 = not published, 1 = published
        //     ]);

        Post::factory(100)->create();
        return redirect( to:'/blog');
    }


    public function showPosts($id){
        $post = POST::findOrFail($id);
        return view('post.show',
         data: ['post' => $post, 
         'pageTitle' => $post->pageTitle ,
          'tabTitle'=> 'show-post']);
    }


    public function deletePosts(){
        Post::destroy(1);
    }
}
