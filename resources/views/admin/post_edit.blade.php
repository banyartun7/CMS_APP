@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Edit Post</div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <a class="btn btn-warning mb-2 text-white" href="/post">Back</a>
            <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="mb-2">Title</label>
                    <input type="text" class="form-control mb-2" name="title" value="{{ old('title', $post->title) }}"
                        placeholder="Enter Post title...">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="mb-2">Content</label>
                    <textarea class="form-control mb-2" name="content" placeholder="Enter post description...">{{ old('content', $post->content) }}</textarea>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="mb-2">Category</label>
                    <select class="form-control mb-2" name="category_id">
                        <option value="">Select category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
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
                <img src="{{ url('/images/' . $post->featured) }}" style="width:150px;height:130px;"><br>
                <button class="mt-5 btn btn-info text-white" type="submit">Update</button>
            </form>
        </div>
    </div>
@endsection
