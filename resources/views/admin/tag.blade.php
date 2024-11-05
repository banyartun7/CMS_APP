@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Tags</div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <a href="/tag/create" class="btn btn-info text-white mb-3">Add new tag</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td><a class="badge text-decoration-none text-bg-warning text-white"
                                    href="tag/{{ $tag->id }}/edit">Update</a>
                                <form action="{{ route('tag.destroy', $tag->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure to remove this tag?')"
                                        class="badge text-bg-danger text-white" style="border-style:none;">DELETE</button>
                                </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
