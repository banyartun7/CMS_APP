@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Edit Category</div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('category.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="mb-2">Name</label>
                    <input type="text" class="form-control mb-2" name="name" value="{{ old('name', $category->name) }}"
                        placeholder="Enter category name...">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button class="mt-5 btn btn-info text-white" type="submit">Update</button>
            </form>
        </div>
    </div>
@endsection
