<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;



class PostController extends Controller
{
   
    public function index()
    {
        //
        $data = Post::latest()->paginate(10);

        return view('post.index', ['posts' => $data,'pageTitle' => 'Blogs-Page', 'tabTitle' => 'blog']);
    }

   
    public function create()
    {
        //
          return view('post.create', ['pageTitle' => 'create-Page', 'tabTitle' => 'create']);
    }



    public function store(BlogPostRequest $request){
        $validated = $request->validated();

        // merge the user_id into the validated data
        $validated['user_id'] = auth()->id();

       // now create with everything
       $post = Post::create($validated);

    return redirect('/blog')->with('success','Post is successfully created');
    }


    public function edit(string $id)
    {
        $post = Post::findOrFail($id);

        Gate::authorize('update', $post);

        // this function is just return view the page of form to edit - redirect to update function
        return view('post.edit', ['post' => $post,'pageTitle' => 'Edit', 'tabTitle' => 'edit']);
        
    }




    public function update(BlogPostRequest $request, string $id){
         // 1. Validate the request using your BlogPostRequest
         $validated = $request->validated();
         // 2. Find the post, or fail if it doesn't exist
         $post = Post::findOrFail($id);
         // 3. (Optional best practice) Ensure the logged-in user owns the post
         Gate::authorize('update', $post);
         // 4. Update the post with validated data
         $post->update($validated);

      // 5. Redirect back to blog index with a success message
      return redirect('/blog')->with('success', 'The Post is successfully updated');
  }


   

    public function destroy(string $id){

        $post = Post::findOrFail($id); // throws 404 if not found
        $post->delete();

        return redirect('/blog')
            ->with('success', 'Post deleted successfully.');
    }

    public function show(string $id){
        $post = Post::findOrFail($id);
        return view('post.show', ['post'=> $post ,'tabTitle'=>'view-post','pageTitle'=> 'Editing Post']);
    }

}
