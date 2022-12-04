@extends('layouts.app')

@section('content')
    <a href="{{ route('clients.create') }}">
        <x-button-create>
            {{ __('CREATE CLIENT') }}
        </x-button-create>
    </a>
    <div class="card">
        <div class="card-header font-weight-bold">
            Clients list
        </div>
        <div class="card-body">
            @if($errors->has('status'))
                @error('status')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            @endif
        </div>

        <div class="d-flex justify-content-end">
            <div class="pr-3">
                <form action="{{ route('clients.index') }}" method="GET">
                    @csrf
                    <div class="form-group">
                        <label for="is_active">Only active: </label>
                        <select class="form-control" name="is_active" id="is_active" onchange="this.form.submit()">
                            <option value="false" {{ request('is_active') === 'false' ? 'selected' : '' }}>No</option>
                            <option value="true" {{ request('is_active') === 'true' ? 'selected' : '' }}>Yes</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Company</th>
                    <th>VAT</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($clients as $client)
                    <tr>
                        <td>
                            {{ $client->company_name }}
                        </td>
                        <td>
                            {{ $client->company_vat }}
                        </td>
                        <td>{{ $client->company_address.', '. $client->company_city.', '.$client->company_zip  }}</td>
                        <td>
                            <a href="{{ route('clients.edit', $client) }}" class="btn btn-info btn-sm">Edit</a>
                            <form action="{{ route('clients.destroy', $client) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display: inline-block;">
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
        {{ $clients->links('vendor.pagination.bootstrap-5') }}
    </div>
@endsection
