<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;

class TagController extends Controller
{
    // Get all tags
    public function index()
    {
        $data = Tag::all();

        return view('tag.index', [
            'tags' => $data,
            'pageTitle' => 'Tags-Page',
            'tabTitle' => 'tag'
        ]);
    }

    // Create 5 tags for the first post using factory
    public function createTags()
    {
        $post = Post::first();

        if (!$post) {
            return response()->json(['error' => 'No post found'], 404);
        }

        // Create 5 tags using factory
        $tags = Tag::factory()->count(5)->create();

        // Attach tags to the post via pivot table
        $post->tags()->attach($tags->pluck('id'));

        return response()->json([
            'post' => $post->title,
            'tags' => $tags
        ]);
    }

    // Delete a tag by UUID
    public function deleteTags(string $id)
    {
        Tag::destroy($id);
        return redirect('/tags');
    }

    // Test Many-to-Many relation
    public function testManyToMany()
    {
        $postA = Post::first();
        $postB = Post::skip(1)->first();

        $tags = Tag::factory()->count(3)->create();

        if ($postA) {
            $postA->tags()->attach([$tags[0]->id, $tags[1]->id]);
        }
        if ($postB) {
            $postB->tags()->attach([$tags[0]->id, $tags[2]->id]);
        }

        return response()->json([
            'postA' => $postA ? $postA->tags : [],
            'postB' => $postB ? $postB->tags : []
        ]);
    }
}
