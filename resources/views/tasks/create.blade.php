@extends('layouts.app')

@section('content')
    <div class="fluid-container">
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    Create task
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deadline">Deadline</label>
                        <input type="date" class="form-control @error('deadline') is-invalid @enderror" name="deadline" value="{{ old('deadline') }}">
                        @error('deadline')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="user">Assigned user</label>
                        <select name="user_id" class="form-select @error('user_id') is-invalid @enderror">
                            <option value="" selected>Select a user...</option>
                            @forelse ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->first_name . ' ' .$user->last_name  }}</option>
                            @empty
                                <option value="" selected>No users.</option>
                            @endforelse
                        </select>
                        @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="client">Assigned client</label>
                        <select name="client_id" class="form-select @error('client_id') is-invalid @enderror">
                            <option value="" selected>Select a client...</option>
                            @forelse ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->company_name  }}</option>
                            @empty
                                <option value="" selected>No clients.</option>
                            @endforelse
                        </select>
                        @error('client_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="project">Assigned project</label>
                        <select name="project_id" class="form-select @error('project_id') is-invalid @enderror">
                            <option value="" selected>Select a project...</option>
                            @forelse ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->title  }}</option>
                            @empty
                                <option value="" selected>No projects.</option>
                            @endforelse
                        </select>
                        @error('project_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
