@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Users</div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <a href="{{ route('user.created') }}" class="btn btn-info text-white mb-3">Add new User</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Set Persmission</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td><img src="{{ url('/images/' . $user->profiles->profile_img) }}"
                                    style="width:75px;height:75px;border-radius:50%"></td>
                            <td>{{ $user->name }}</td>
                            <td>
                                @if ($user->is_admin)
                                    Admin
                                @else
                                    User
                                @endif
                            </td>
                            <td>
                                @if ($user->is_admin)
                                    <a class="badge bg-primary text-decoration-none"
                                        href="{{ route('user.role.edit', [0, $user->id]) }}">Set User</a>
                                @else
                                    <a class="badge bg-danger text-decoration-none"
                                        href="{{ route('user.role.edit', [1, $user->id]) }}">Set Admin</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
