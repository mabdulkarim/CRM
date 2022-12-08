@extends('layouts.app')

@section('content')
    <div class="fluid-container">
        <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card w-100">
                <div class="card-header font-weight-bold">
                    Company information
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="company_name">Company name</label>
                            <input type="text"
                                id="company_name"
                                class="form-control @error('company_name') is-invalid @enderror"
                                name="company_name"
                                value="{{ old('company_name') }}">
                                @error('company_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="company_vat">Company vat</label>
                            <input type="text"
                                id="company_vat"
                                class="form-control @error('company_vat') is-invalid @enderror"
                                name="company_vat"
                                value="{{ old('company_vat') }}">
                                @error('company_vat')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="company_address">Company address</label>
                                <input type="text"
                                    id="company_address"
                                    class="form-control @error('company_address') is-invalid @enderror"
                                    name="company_address"
                                    value="{{ old('company_address') }}">
                                    @error('company_address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="col">
                                <label for="company_city">Company city</label>
                                <input type="text"
                                    id="company_city"
                                    class="form-control @error('company_city') is-invalid @enderror"
                                    name="company_city"
                                    value="{{ old('company_city') }}">
                                    @error('company_city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="col">
                                <label for="company_zip">Company zip-code</label>
                                <input type="text"
                                    id="company_zip"
                                    class="form-control @error('company_zip') is-invalid @enderror"
                                    name="company_zip"
                                    value="{{ old('company_zip') }}">
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
                                id="contact_name"
                                class="form-control @error('contact_name') is-invalid @enderror"
                                name="contact_name"
                                value="{{ old('contact_name') }}">
                                @error('contact_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="mb-3">
                            <label for="contact_email">Contact email</label>
                            <input type="text"
                                id="contact_email"
                                class="form-control @error('contact_email') is-invalid @enderror"
                                name="contact_email"
                                value="{{ old('contact_email') }}">
                                @error('contact_email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="mb-3">
                            <label for="contact_phone_number">Contact phone number</label>
                            <input type="text"
                                id="contact_phone_number"
                                class="form-control @error('contact_phone_number') is-invalid @enderror"
                                name="contact_phone_number"
                                value="{{ old('contact_phone_number') }}">
                                @error('contact_phone_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
