@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Posts</div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <a href="/post/create" class="btn btn-info text-white mb-3">Add new Post</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ Str::limit($post->content, 10) }}</td>
                            <td><a class="badge text-decoration-none text-bg-warning text-white"
                                    href="post/{{ $post->id }}/edit">Update</a>
                                <a class="badge text-decoration-none text-bg-primary text-white"
                                    href="post/{{ $post->id }}">View</a>
                                <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure to remove this post?')"
                                        class="badge text-bg-danger text-white" style="border-style:none;">DELETE</button>
                                </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
