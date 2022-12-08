@extends('layouts.app')

@section('content')
    <div class="fluid-container">
        <div class="text-center">
            <h3>Edit {{ $client->company_name }}</h3>
        </div>
        <form method="post" action="{{ route('clients.update', $client) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="card w-100">
                <div class="card-header font-weight-bold">
                    Company information
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="company_name">Company name</label>
                            <input type="text"
                                class="form-control @error('company_name') is-invalid @enderror"
                                name="company_name"
                                placeholder="Company name..."
                                value="{{ $client->company_name }}">
                                @error('company_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="company_vat">Company vat</label>
                            <input type="text"
                                class="form-control @error('company_vat') is-invalid @enderror"
                                name="company_vat"
                                placeholder="Company VAT..."
                                value="{{ $client->company_vat }}">
                                @error('company_vat')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="company_address">Company Address</label>
                                <input type="text"
                                    class="form-control @error('company_address') is-invalid @enderror"
                                    name="company_address"
                                    placeholder="Company address..."
                                    value="{{ $client->company_address }}">
                                    @error('company_address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="col">
                                <label for="company_city">Company city</label>
                                <input type="text"
                                    class="form-control @error('company_city') is-invalid @enderror"
                                    name="company_city"
                                    placeholder="Company city..."
                                    value="{{ $client->company_city }}">
                                    @error('company_city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="col">
                                <label for="company_zip">Company zip</label>
                                <input type="text"
                                    class="form-control @error('company_zip') is-invalid @enderror"
                                    name="company_zip"
                                    placeholder="Company ZIP-code..."
                                    value="{{ $client->company_zip }}">
                                    @error('company_zip')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        <div class="col mb-3 p-0">
                            <label for="formFile" class="form-label">Company logo</label>
                            <input class="form-control @error('logo') is-invalid @enderror" type="file" id="formFile" name="logo">
                            @error('logo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                </div>
            </div>
            <div class="card w-100">
                <div class="card-header font-weight-bold">
                    Contact information
                </div>
                <div class="card-body">
                        <div class="mb-3">
                            <label for="contact_name">Contact name</label>
                            <input type="text"
                                class="form-control @error('contact_name') is-invalid @enderror"
                                name="contact_name"
                                placeholder="Contact name..."
                                value="{{ $client->contact_name }}">
                                @error('contact_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="mb-3">
                            <label for="contact_email">Contact email</label>
                            <input type="text"
                                class="form-control @error('contact_email') is-invalid @enderror"
                                name="contact_email"
                                placeholder="Contact email..."
                                value="{{ $client->contact_email }}">
                                @error('contact_email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="mb-3">
                            <label for="contact_phone_number">Contact phone number</label>
                            <input type="text"
                                class="form-control @error('contact_phone_number') is-invalid @enderror"
                                name="contact_phone_number"
                                placeholder="Contact phonenumber..."
                                value="{{ $client->contact_phone_number }}">
                                @error('contact_phone_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                </div>
            </div>

            <x-button-create>SAVE</x-button-create>
        </form>
    </div>
@endsection
