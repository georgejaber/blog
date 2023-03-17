<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

$posts = Post::all();

        return view("posts.index",compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        Post::create($request->all());

        return redirect()->route('posts.index')->with('success','Post created Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $post = Post::find($id);

    return view("posts.show",compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);

        return view('posts.edit',compact('id','post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        Post::find($id)->update($request->all());

        return redirect()->route('posts.index')->with('success','Post Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::withTrashed()->find($id)->forceDelete();

        return redirect()->route('posts.trashed')->with('success','Post Permently Deleted Successfully');

    }

    public function softdelete(string $id)
    {
        Post::find($id)->delete();

        return redirect()->route('posts.index')->with('success','Post SoftDeleted Successfully');

    }

    public function get_trashed()
    {
        $trashedposts = Post::onlyTrashed()->get();
        return view('posts.trashed',compact('trashedposts'));

    }

    public function restore(string $id)
    {
        $restore_post =Post::withTrashed()->find($id)->restore();

        return redirect()->route('posts.trashed')->with('success','Post restored Successfully');


    }

    public function restoreall()
    {
        $restore_post =Post::withTrashed()->restore();

        return redirect()->route('posts.trashed')->with('success','Posts restored Successfully');

    }
}
