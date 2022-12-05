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

        <div class="d-flex justify-content-end">
            <div class="pr-3">
                <form action="{{ route('users.index') }}" method="GET">
                    <div class="form-group">
                        <label for="deleted">Show deleted: </label>
                        <select class="form-control" name="deleted" id="deleted" onchange="this.form.submit()">
                            <option value="false" {{ request('deleted') === 'false' ? 'selected' : '' }}>No</option>
                            <option value="true" {{ request('deleted') === 'true' ? 'selected' : '' }}>Yes</option>
                        </select>
                    </div>
                </form>
            </div>
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
                    @if ($deleted)
                        <th>Deleted at</th>
                    @endif
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
                        @if ($deleted)
                            <td>
                                {{ $user->deleted_at ? $user->deleted_at->format('Y-m-d') : 'Not Deleted.' }}
                            </td>
                        @endif
                        @hasrole('admin')
                        <td>
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-info btn-sm">Edit</a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                        @endhasrole
                    </tr>
                @empty
                    <h1>NO USERS.</h1>
                @endforelse
                </tbody>
            </table>
        </div>
        {{ $users->withQueryString()->links('vendor.pagination.bootstrap-5') }}
    </div>
@endsection
