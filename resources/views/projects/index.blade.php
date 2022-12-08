@extends('layouts.app')

@section('content')
    <a href="{{ route('projects.create') }}">
        <x-button-create>CREATE PROJECT</x-button-create>
    </a>

    <div class="card">
        <div class="card-header font-weight-bold">
            Projects list
        </div>

        @if($errors->has('status'))
            @error('status')
            <div class="alert alert-danger m-2" role="alert">
                {{ $message }}
            </div>
            @enderror
        @endif

        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Assigned to</th>
                    <th>Client</th>
                    <th>Deadline</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($projects as $project)
                    <tr>
                        <td>
                            {{ $project->title }}
                        </td>
                        <td>
                            {{ $project->user->first_name . ' ' . $project->user->last_name }}
                        </td>
                        <td>
                            {{ $project->client->company_name }}
                        </td>
                        <td>{{ $project->deadline }}</td>
                        <td>
                            <a href="{{ route('projects.edit', $project) }}" class="btn btn-info btn-sm">Edit</a>
                            <form action="{{ route('projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <h1>NO CLIENTS.</h1>
                @endforelse
                </tbody>
            </table>
        </div>
        {{ $projects->links('vendor.pagination.bootstrap-5') }}
    </div>
@endsection
