<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\postStoreRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->get();
        return view('admin.post',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $categories = Category::all();
       return view('admin.post_create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(postStoreRequest $request)
    {
        if(!empty(request()->image)){
            $imageName = date('YmdHis') . "." . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
        }
        

        Post::create($request->validated() + ['featured' => empty($imageName) ? null : $imageName]);
        return redirect('/post')->with('status',config('alert.post.create'));
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
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.post_edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(postStoreRequest $request, Post $post)
    {
        if(!empty(request()->image)){
            $imageName = date('YmdHis') . "." . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
        }
        $post->update($request->validated() + ['featured' => empty(request()->image) ? $post->featured : $imageName]);
        return redirect('/post')->with('status',config('alert.post.update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/post')->with('status',config('alert.post.delete'));
    }
}
