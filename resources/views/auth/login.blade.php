{{-- @extends('layouts.app') --}}
@extends('template')

@section('content')
<script src="assets/static/js/initTheme.js"></script>
<div id="auth">
    <div class="row h-100">
      <div class="col-lg-8 col-12">
        <div id="auth-left">
          <div class="auth-logo">
            <a href="index.html"
              ><img src="{{asset('logo.png')}}" alt="Logo" style="width:100px;height:auto;"
            /></a>
          </div>
          <h1 class="auth-title">Log in.</h1>
          <p class="auth-subtitle mb-4">
            Log in sesuai dengan data yang sudah anda registrasikan.
          </p>

          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group position-relative has-icon-left mb-4">
              <input
                type="email"
                class="form-control form-control-m @error('email') is-invalid @enderror" 
                placeholder="Email"
                name="email" 
                value="{{ old('email') }}" required autocomplete="email" autofocus
              />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              <div class="form-control-icon">
                <i class="bi bi-person"></i>
              </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
              <input
                type="password"
                class="form-control form-control-md @error('password') is-invalid @enderror"
                placeholder="Password"
                name="password" 
                value="{{ old('password') }}" required autocomplete="password" autofocus
              />
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
              </div>
            </div>
            <div class="form-check form-check-md d-flex align-items-end">
              <input
                class="form-check-input me-2"
                type="checkbox"
                id="flexCheckDefault"
                name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}
              />
              <label
                class="form-check-label text-gray-600"
                for="flexCheckDefault"
              >
                Ingat Saya!
              </label>
            </div>
            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
              Log in
            </button>
          </form>
          <div class="text-center mt-5 text-md fs-5">
            <p class="text-gray-600">
              Belum memiliki akun?
              <a href="{{ route('register') }}" class="font-bold">Daftar disini!</a>
            </p>
            <p>
                @if (Route::has('password.request'))
              <a class="font-bold" href="{{ route('password.request') }}"
                >Lupa Password?</a>
                @endif
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right"></div>
      </div>
    </div>
  </div>
@endsection
