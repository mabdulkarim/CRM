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
            <div class="alert alert-danger" role="alert">
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
                            <div class="d-flex">
                                <a href="{{ route('projects.edit', $project) }}"><i class="fa-solid fas fa-pen fa-lg p-1" style="color:#321fdb"></i></a>
                                <form action="{{ route('projects.destroy', $project) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn p-0"><i class="fa-solid fas fa-user-minus fa-lg" style="color: red"></i></button>
                                </form>
                            </div>
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
