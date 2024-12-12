@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center py-4">
        <div class="col-md-6">
            <div class="card shadow-lg rounded-3">
                <div class="card-header text-center bg-primary text-white fs-4">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link p-0" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>

                        <div class="d-grid gap-2 mb-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Aggiunta degli stili personalizzati -->
<style>
    .card {
        border: none;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    }

    .form-control {
        border-radius: 10px;
        box-shadow: none;
    }

    .form-control:focus {
        box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
        border-color: #80bdff;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        border-radius: 10px;
        font-size: 1.2rem;
        padding: 0.75rem 1.25rem;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .btn-link {
        color: #007bff;
    }

    .btn-link:hover {
        color: #0056b3;
    }

    .invalid-feedback {
        font-size: 0.875rem;
        color: #dc3545;
    }

    .card-header {
        border-radius: 10px 10px 0 0;
    }

    .form-check-label {
        font-size: 1rem;
    }
</style>
