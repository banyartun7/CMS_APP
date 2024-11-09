@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">My Profile</div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <a href="/post/create" class="btn btn-info text-white mb-3">Back</a>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-2">
                    <label class="mb-2">Name</label>
                    <input class="form-control" type="text" placeholder="Enter Name" name="name"
                        value="{{ old('name', $user->name) }}">
                </div>

                <div class="form-group mb-2">
                    <label class="mb-2">Email</label>
                    <input class="form-control" type="email" placeholder="Enter Email" name="email"
                        value="{{ old('email', $user->email) }}">
                </div>

                <div class="form-group mb-2">
                    <label class="mb-2">Profile Image</label>
                    <input class="form-control mb-2" type="file" name="profile_img">
                    <img src="{{ url('/images/' . $user->profiles->profile_img) }}" style="width:150px;height:130px;">
                </div>

                <div class="form-group mb-2">
                    <label class="mb-2">Facebook</label>
                    <input class="form-control" type="text" name="facebook_link"
                        value="{{ old('facebook_link', $user->profiles->facebook_link) }}">
                </div>

                <div class="form-group mb-2">
                    <label class="mb-2">Youtube</label>
                    <input class="form-control" type="text" name="youtube_link"
                        value="{{ old('youtube_link', $user->profiles->youtube_link) }}">
                </div>

                <div class="form-group mb-2">
                    <label class="mb-2">About</label>
                    <textarea class="form-control" name="about">{{ old('about', $user->profiles->about) }}</textarea>
                </div>
                <button class="btn btn-warning text-white" type="submit">Update</button>
            </form>
        </div>
    </div>
@endsection
