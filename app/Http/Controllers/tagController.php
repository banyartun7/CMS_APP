<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\tagStoreRequest;

class tagController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
       $tags = Tag::all();
       return view('admin.tag',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tag_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(tagStoreRequest $request)
    {
        Tag::create($request->validated() + ['slug' => Str::slug(request()->name)]);
        return redirect('/tag')->with('status',config('alert.tag.create'));
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
    public function edit(Tag $tag)
    {
        return view('admin.tag_edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(tagStoreRequest $request, Tag $tag)
    { 
        $tag->update($request->validated() + ['slug' => Str::slug(request()->name)]);
        return redirect('/tag')->with('status',config('alert.tag.update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect('/tag')->with('status',config('alert.tag.delete'));
    }
}
