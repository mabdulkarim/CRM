
@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header font-weight-bold">
                CHANGE USER INFORMATION
            </div>
            <div class="card-body register-card-body">
                <form method="post" action="{{ route('users.update', $user) }}">
                    @csrf
                    @method('PATCH')
                    <div class="input-group mb-3">
                        <input type="text"
                               name="first_name"
                               class="form-control @error('first_name') is-invalid @enderror"
                               value="{{ $user->first_name }}"
                               placeholder="First Name">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-user"></span></div>
                        </div>
                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="text"
                               name="last_name"
                               class="form-control @error('last_name') is-invalid @enderror"
                               value="{{ $user->last_name }}"
                               placeholder="Last Name">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-user"></span></div>
                        </div>
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-sm">Change</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div>
    </div>
@endsection
