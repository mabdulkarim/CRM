@extends('layouts.app')

@section('content')
    @hasrole('admin')
    <a href="{{ route('users.create') }}">
        <x-button-create>
            {{ __('CREATE USER') }}
        </x-button-create>
    </a>
    @endhasrole

    <div class="card">
        <div class="card-header font-weight-bold">
            Users list
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date Created</th>
                    <th>Role</th>
                    @hasrole('admin')
                    <th>Action</th>
                    @endhasrole
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            {{ $user->first_name }}
                        </td>
                        <td>
                            {{ $user->last_name }}
                        </td>
                        <td>{{ $user->created_at->format('Y-m-d') }}</td>
                        <td>
                            @foreach($user->roles as $role)
                                {{ $role->name }}
                            @endforeach
                        </td>
                        @hasrole('admin')
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('users.edit', $user) }}"><i class="fa-solid fas fa-pen fa-lg p-1" style="color:#321fdb"></i></a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn p-0"><i class="fa-solid fas fa-user-minus fa-lg" style="color: red"></i></button>
                                </form>
                            </div>
                        </td>
                        @endhasrole
                    </tr>
                @empty
                    <h1>NO USERS.</h1>
                @endforelse
                </tbody>
            </table>
        </div>
        {{ $users->links('vendor.pagination.bootstrap-5') }}
    </div>
@endsection
