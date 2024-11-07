@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Add new Tag</div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form action="/tag" method="POST">
                @csrf
                <a class="btn btn-warning text-white mb-3" href="/tag">Back</a>
                <div class="form-group">
                    <label class="mb-2">Name</label>
                    <input type="text" class="form-control mb-2" name="name" value="{{ old('name') }}"
                        placeholder="Enter tag name...">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button class="mt-5 btn btn-info text-white" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection