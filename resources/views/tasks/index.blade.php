@extends('layouts.app')

@section('content')
    <a href="{{ route('tasks.create') }}">
        <x-button-create>CREATE PROJECT</x-button-create>
    </a>

    <div class="card">
        <div class="card-header font-weight-bold">
            Tasks list
        </div>
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
                @forelse($tasks as $task)
                    <tr>
                        <td>
                            {{ $task->title }}
                        </td>
                        <td>
                            {{ $task->user->first_name . ' ' . $task->user->last_name }}
                        </td>
                        <td>
                            {{ $task->client->company_name }}
                        </td>
                        <td>{{ $task->deadline }}</td>
                        <td>
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-info btn-sm">Edit</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <h1>NO TASKS.</h1>
                @endforelse
                </tbody>
            </table>
        </div>
        {{ $tasks->links('vendor.pagination.bootstrap-5') }}
    </div>
@endsection
