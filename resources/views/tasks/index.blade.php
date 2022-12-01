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
                            <div class="d-flex">
                                <a href="{{ route('tasks.edit', $task) }}"><i class="fa-solid fas fa-pen fa-lg p-1" style="color:#321fdb"></i></a>
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn p-0"><i class="fa-solid fas fa-user-minus fa-lg" style="color: red"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <h1>NO TASKS.</h1>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
