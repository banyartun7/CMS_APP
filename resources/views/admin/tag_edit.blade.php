@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Edit Tag</div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <a class="btn btn-warning mb-2 text-white" href="/tag">Back</a>
            <form action="{{ route('tag.update', $tag->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="mb-2">Name</label>
                    <input type="text" class="form-control mb-2" name="name" value="{{ old('name', $tag->name) }}"
                        placeholder="Enter tag name...">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button class="mt-5 btn btn-info text-white" type="submit">Update</button>
            </form>
        </div>
    </div>
@endsection
