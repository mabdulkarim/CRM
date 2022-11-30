@extends('layouts.app')

@section('content')
    <div class="fluid-container">
        <form action="{{ route('projects.update', $project) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="card">
                <div class="card-header">
                    Edit project
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               id="title"
                               name="title"
                               value="{{ $project->title }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  name="description"
                                  id="description"
                                  cols="30"
                                  rows="10">{{ $project->description }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deadline">Deadline</label>
                        <input type="text"
                               class="form-control @error('deadline') is-invalid @enderror"
                               name="deadline"
                               placeholder="{{ $project->deadline }}"
                               value="{{ $project->deadline }}" onfocus="(this.type='date')" onblur="(this.type='text')">
                        @error('deadline')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="user">Assigned user</label>
                        <select name="user_id" class="form-select @error('user_id') is-invalid @enderror">
                            <option value="{{ $project->user->id }}" selected>{{ $project->user->first_name . ' ' . $project->user->last_name }}</option>
                            @forelse ($users as $user)
                                @if($project->user->id !== $user->id)
                                    <option value="{{ $user->id }}">{{ $user->first_name . ' ' .$user->last_name  }}</option>
                                @endif
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
                            <option value="{{ $project->client->id }}" selected>{{$project->client->company_name}}</option>
                            @forelse ($clients as $client)
                                @if($project->client->id !== $client->id)
                                    <option value="{{ $client->id }}">{{ $client->company_name  }}</option>
                                @endif
                            @empty
                                <option value="" selected>No clients.</option>
                            @endforelse
                        </select>
                        @error('client_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
