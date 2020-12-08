@extends('layouts.app')

@section('title', 'Login')

@section('content')
  <form action="{{ route('login') }}" method="post" class="login-form">
    @csrf

    <div class="col-md-4 offset-md-4">
      <div class="card login-card">
        <div class="card-body">
          <div class="title mb-3 text-center">{{ __('Login') }}</div>
          <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
              placeholder="name@example.com" required>

            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input type="password" name="password" class="form-control" id="password" required>
          </div>

          <div class="d-grid">
            <button type="submit" class="btn btn-primary">{{ __('Sign in') }}</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection

