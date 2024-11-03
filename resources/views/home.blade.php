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
            <a href="#" class="btn btn-info text-white">Add new Category</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Some</td>
                        <td><a class="badge text-decoration-none text-bg-warning text-white" href="#">Update</a><br><a
                                class="badge text-decoration-none text-bg-danger" href="#">Delete</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
