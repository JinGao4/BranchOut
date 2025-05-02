@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Are you a company? Checkbox -->
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="isCompanyCheckbox">
                                    <label class="form-check-label" for="isCompanyCheckbox">
                                        {{ __('Registering as a Company?') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Company Fields (hidden by default) -->
                        <div id="companyFields" style="display: none;">
                            <div class="row mb-3">
                                <label for="company_email" class="col-md-4 col-form-label text-md-end">{{ __('Company Email') }}</label>

                                <div class="col-md-6">
                                    <input id="company_email" type="email" class="form-control" name="company_email" value="{{ old('company_email') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="company_phone" class="col-md-4 col-form-label text-md-end">{{ __('Company Phone') }}</label>

                                <div class="col-md-6">
                                    <input id="company_phone" type="number" class="form-control" name="company_phone" value="{{ old('company_phone') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="about" class="col-md-4 col-form-label text-md-end">{{ __('About') }}</label>

                                <div class="col-md-6">
                                    <input id="about" type="text" class="form-control" name="about" value="{{ old('about') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <!-- Hidden role input -->
                        <input type="hidden" id="roleInput" name="role" value="user">

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a class="btn btn-link" href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Small JavaScript to toggle fields -->
                    <script>
                        const checkbox = document.getElementById('isCompanyCheckbox');
                        const companyFields = document.getElementById('companyFields');
                        const roleInput = document.getElementById('roleInput');

                        checkbox.addEventListener('change', function () {
                            if (this.checked) {
                                companyFields.style.display = 'block';
                                roleInput.value = 'c';
                            } else {
                                companyFields.style.display = 'none';
                                roleInput.value = 'user';
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
