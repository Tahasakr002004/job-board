<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         $data = Tag::all();

        return view('tag.index', [
            'tags' => $data,
            'pageTitle' => 'Tags-Page',
            'tabTitle' => 'tag'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('tag.creat',['pageTitle'=>'Create new Title','tabTitle' => 'create']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
        $tag = Tag::findOrFail($id);
        return view('tag.edit', [ 'tag'=> $tag , 'pageTitle' => 'Tags-Page',
            'tabTitle' => ' edit-tag']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
