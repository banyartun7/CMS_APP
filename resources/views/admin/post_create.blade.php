@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Add new Post</div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form action="/post" method="POST" enctype="multipart/form-data">
                @csrf
                <a class="btn btn-warning text-white mb-3" href="/post">Back</a>
                <div class="form-group">
                    <label class="mb-2">Title</label>
                    <input type="text" class="form-control mb-2" name="title" value="{{ old('title') }}"
                        placeholder="Enter post title...">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="mb-2">Content</label>
                    <input type="text" class="form-control mb-2" name="content" value="{{ old('content') }}"
                        placeholder="Enter post description...">
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="mb-2">Category</label>
                    <select class="form-control mb-2" name="category_id">
                        <option value="">Select category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="mb-2">Poster for post</label>
                    <input type="file" class="form-control mb-2" name="image">
                </div>
                <button class="mt-5 btn btn-info text-white" type="submit">Add</button>
            </form>
        </div>
    </div>
@endsection