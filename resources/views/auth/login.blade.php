@extends('layouts.auth')

@section('content')

<div class="d-flex align-items-center justify-content-center vh-100">
    <div class="col-md-6">
        <div class="card shadow-sm border-0 rounded">
            <div class="card-header bg-primary text-white text-center">
                <h3 class="fw-bold mb-0">Sign In</h3>
                <p class="small mb-0">Access your account securely</p>
            </div>
            <div class="card-body bg-light p-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email Address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror rounded" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror rounded" name="password" required>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg rounded">Login</button>
                    </div>

                    <div class="text-center mt-3">
                        <small class="text-muted">Don't have an account?</small>
                        <a href="{{ route('register') }}" class="text-decoration-none fw-bold">Register here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-primary {
        background-color: #007bff !important;
    }
    .rounded {
        border-radius: 10px;
    }
    .shadow-sm {
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }
</style>

@endsection
