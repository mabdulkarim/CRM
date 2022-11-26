@extends('layouts.app')

@section('content')
    <a href="{{ route('users.create') }}">
        <div class="btn btn-success btn-lg rounded mb-2"><i class="fa-solid fas fa-user-plus"></i></div>
    </a>
    <div class="card">
        <div class="card-header">
            Users list
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Date Created</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            {{ $user->name }}</a></td>
                        <td>{{ $user->created_at->format('Y-m-d') }}</td>
                        <td>Admin</td>
                        <td>
                            <a href="{{ route('users.edit', $user) }}"><i class="fa-solid fas fa-pen fa-lg" style="color:#321fdb"></i></a>
                            <a href="#"><i class="fa-solid fas fa-user-minus fa-lg" style="color: red"></i></a>
                        </td>
                    </tr>
                @empty
                    <h1>NO USERS.</h1>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
