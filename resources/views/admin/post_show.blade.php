@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Detail</div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <a href="/post/create" class="btn btn-info text-white mb-3">Add new Post</a>
            <a href="/post" class="btn btn-warning text-white mb-3">View All Posts</a>

            <p>Title : {{ $post->title }}</p>
            <p>Content : {{ $post->content }}</p>
            <p>Category : <i>{{ $post->category->name }}</i></p>
            <img src="{{ url('/images/' . $post->featured) }}" style="width:150px;height:130px;">
        </div>
    </div>
@endsection
