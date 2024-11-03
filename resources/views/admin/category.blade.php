@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Control</div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <a href="/category/create" class="btn btn-info text-white mb-3">Add new Category</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td><a class="badge text-decoration-none text-bg-warning text-white"
                                    href="category/{{ $category->id }}/edit">Update</a><br>
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure to remove this category?')"
                                        class="badge text-bg-danger text-white" style="border-style:none;">DELETE</button>
                                </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
