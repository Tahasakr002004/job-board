<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;

class TagController  extends Controller
{
    // Get all data from model Tag
    public function index()
    {
        $data = Tag::all();

        return view('tag.index', ['tags' => $data,'pageTitle' => 'Tags-Page', 'tabTitle' => 'tag']);
    }
     public function createTags()
    {
        Tag::create([
                'title'     => "Angular"
            ]);
        

        return redirect( to:'/tags');
    }



    public function deleteTags(){
        Tag::destroy(1);
    }



    public function testManyToMany(){
        $post9 = Post::find(10);
        $post10 = Post::find(10);

        $post9->tags()->attach([1, 2]);
        $post10->tags()->attach([1, 3]);


        return response()->json([
            'post9' => $post9->tags,
            'post10' => $post10->tags
        ]);
    }
}
