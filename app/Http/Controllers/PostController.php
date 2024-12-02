<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\postStoreRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function __construct(){
    //     $this->middleware('auth');
    // }

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
       $tags = Tag::all();
       return view('admin.post_create',compact('categories','tags'));
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
       
        $post = Post::create($request->validated() + ['featured' => empty($imageName) ? null : $imageName, 'slug' => Str::slug(request()->title)]);
        $post->tags()->attach($request->tags);
        return redirect('/post')->with('status',config('alert.post.create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.post_show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post_edit',compact('post','categories','tags'));
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
        $post->update($request->validated() + ['featured' => empty(request()->image) ? $post->featured : $imageName,'slug' => Str::slug(request()->title)]);
        $post->tags()->sync($request->tags);
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

    public function postByTag($slug){
       $tags = Tag::where('slug',$slug)->first();
       $posts = $tags->posts;
       return view('index',compact('posts'));
    }
}
