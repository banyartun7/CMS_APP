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
                        <th>Name</th>
                        <th>Set Persmission</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                @if ($user->is_admin)
                                    <a class="badge bg-primary text-decoration-none" href="/user/add">Set User</a>
                                @else
                                    <a class="badge bg-danger text-decoration-none" href="#">Set Admin</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
