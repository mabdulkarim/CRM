@extends('layouts.app')

@section('content')
    <div class="fluid-container">
        <form action="{{ route('clients.store') }}" method="POST">
            @csrf

            <div class="card w-100">
                <div class="card-header font-weight-bold">
                    Company information
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col mb-3">
                            <input type="text" 
                                class="form-control @error('company_name') is-invalid @enderror"  
                                name="company_name" 
                                placeholder="Company name..." 
                                value="{{ old('company_name') }}">
                                @error('company_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col mb-3">
                            <input type="text" 
                                class="form-control @error('company_vat') is-invalid @enderror"
                                name="company_vat" 
                                placeholder="Company VAT..." 
                                value="{{ old('company_vat') }}">
                                @error('company_vat')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                        <div class="row">
                            <div class="col">
                                <input type="text" 
                                    class="form-control @error('company_address') is-invalid @enderror" 
                                    name="company_address" 
                                    placeholder="Company address..." 
                                    value="{{ old('company_address') }}">
                                    @error('company_address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="col">
                                <input type="text" 
                                    class="form-control @error('company_city') is-invalid @enderror"
                                    name="company_city" 
                                    placeholder="Company city..." 
                                    value="{{ old('company_city') }}">
                                    @error('company_city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div> 
                            <div class="col">
                                <input type="text" 
                                    class="form-control @error('company_zip') is-invalid @enderror" 
                                    name="company_zip" 
                                    placeholder="Company ZIP-code..." 
                                    value="{{ old('company_zip') }}">
                                    @error('company_zip')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div> 
                        </div>
                </div>
            </div>
            <div class="card w-100">
                <div class="card-header font-weight-bold">
                    Contact information
                </div>
                <div class="card-body">
                        <div class="mb-3">
                            <input type="text" 
                                class="form-control @error('contact_name') is-invalid @enderror" 
                                name="contact_name" 
                                placeholder="Contact name..." 
                                value="{{ old('contact_name') }}">
                                @error('contact_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="mb-3">
                            <input type="text" 
                                class="form-control @error('contact_email') is-invalid @enderror" 
                                name="contact_email" 
                                placeholder="Contact email..." 
                                value="{{ old('contact_email') }}">
                                @error('contact_email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="mb-3">
                            <input type="text" 
                                class="form-control @error('contact_phone_number') is-invalid @enderror"
                                name="contact_phone_number" 
                                placeholder="Contact phonenumber..." 
                                value="{{ old('contact_phone_number') }}">
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