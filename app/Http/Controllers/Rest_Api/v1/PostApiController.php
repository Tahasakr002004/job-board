<?php

namespace App\Http\Controllers\Rest_Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;




class PostApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
   {
     // Fetch all posts
     $data = Post::paginate(10);
        if ($data->isEmpty()) {
            return response()->json([
                "status"=> "error",
                "message"=> "Data not found"
                ],404);
        }
     // Return JSON response with 200 OK
     return response()->json([
        'status' => 'success',
        'data' => $data
     ], 200);
   }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = Post::create($request->all());
         if ($data->isEmpty()) {
            return response()->json([
                "status"=> "error",
                "message"=> "Data not found"
                ],404);
        }
        return response()->json([
            'status'=> 'success',
            'data'=> $data
            ],201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Post::find($id);
         if ($data->isEmpty()) {
            return response()->json([
                "status"=> "error",
                "message"=> "Data not found"
                ],404);
        }
        return response()->json([
            'status'=> 'success',
            'data'=> $data
            ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Post::find($id);
         if ($data->isEmpty()) {
            return response()->json([
                "status"=> "error",
                "message"=> "Data not found"
                ],404);
        }
        $data->update($request->all());
        return response()->json([
            'status'=> 'success',
            'data'=> $data
            ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Post::find($id);
         if ($data->isEmpty()) {
            return response()->json([
                "status"=> "error",
                "message"=> "Data not found"
                ],404);
        }
        $data->delete();
        return response()->json([
            'status'=> 'success'
            ],200);
    }
}
