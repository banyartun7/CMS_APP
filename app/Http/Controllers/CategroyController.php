<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\categoryStoreRequest;
use Illuminate\Support\Str;

class CategroyController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        return view('admin.category',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cate_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(categoryStoreRequest $request)
    {
        Category::create($request->validated() + ['slug' => Str::slug(request()->name)]);
        return redirect('/category')->with('status',config('alert.category.create'));
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
    public function edit(Category $category)
    {
        return view('admin.cate_edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(categoryStoreRequest $request, Category $category)
    {
        $category->update($request->validated() + ['slug' => Str::slug(request()->name)]);
        return redirect('/category')->with('status', config('alert.category.update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/category')->with('status',config('alert.category.delete'));
    }
}
