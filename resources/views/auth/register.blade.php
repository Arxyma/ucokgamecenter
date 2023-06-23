@extends('template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
    <div id="auth-left">
        <div class="auth-logo">
            <a href="index.html"><img src="{{asset('logo.png')}}" alt="Logo" style="width:100px;height:auto;"></a>
        </div>
        <h1 class="auth-title">Sign Up</h1>
        <p class="auth-subtitle mb-4">Masukkan data untuk registrasi.</p>

        <form action="" method="POST">
            @csrf
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-md" name="name" placeholder="Fullname">
                <div class="form-control-icon">
                    <i class="bi bi-person"></i>
                </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="email" class="form-control form-control-md" name="email" placeholder="Email">
                <div class="form-control-icon">
                    <i class="bi bi-envelope"></i>
                </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" class="form-control form-control-md" name="password" placeholder="Password">
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" class="form-control form-control-md" name="password_confirmation" placeholder="Confirm Password">
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
            </div>
           
            <button class="btn btn-primary btn-block btn-md shadow-lg mt-3">Sign Up</button>
        </form>
        <div class="text-center mt-5 text-lg fs-5">
            <p class='text-gray-600'>Sudah memiliki akun? <a href="{{ route('login') }}"
                    class="font-bold">Log
                    in</a>.</p>
        </div>
    </div>
</div>
    </div>
</div>

@endsection
