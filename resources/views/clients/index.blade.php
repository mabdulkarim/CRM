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
                            <div class="d-flex">
                                <a href="{{ route('clients.edit', $client) }}"><i class="fa-solid fas fa-pen fa-lg p-1" style="color:#321fdb"></i></a>
                                <form action="{{ route('clients.destroy', $client) }}" method="POST">
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
        {{ $clients->links('vendor.pagination.bootstrap-5') }}
    </div>
@endsection
