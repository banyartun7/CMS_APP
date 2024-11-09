@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Add new User</div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('user.stored') }}" method="POST">
                @csrf
                <a class="btn btn-warning text-white mb-3" href="/user">Back</a>
                <div class="form-group">
                    <label class="mb-2">Enter Name</label>
                    <input type="text" class="form-control mb-2" name="name" value="{{ old('name') }}"
                        placeholder="Enter user name...">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="mb-2">Enter Email</label>
                    <input type="email" class="form-control mb-2" name="email" value="{{ old('email') }}"
                        placeholder="Enter email name...">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="mb-2">Enter Password</label>
                    <input type="password" class="form-control mb-2" name="password" value="{{ old('password') }}"
                        placeholder="Enter password...">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button class="mt-5 btn btn-info text-white" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
