@extends('template')
@section('content')


<div class="page-content">

@foreach($data as $d)
<div class="container">
    
    <div class="mx-5 px-5 card pt-5 pb-5">
            <div class="d-grid gap-2 d-md-block mb-3">
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-warning"><i class="bi bi-arrow-left-circle-fill"></i> Kembali</a>
            </div>
    
            <h4><strong>Halaman Ubah Data Akun </strong></h4>
    
        <form action="/akun/edit" method="post">
            {{ csrf_field() }}
            
            <div class="mb-3">
                <label for="id" class="form-label">ID Kaset</label>
                <input type="text" class="form-control disabled" id="id" name="id" aria-describedby="id" required value="{{ $d->id }}" readonly>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="name" autofocus value="{{$d->name}}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"  aria-describedby="email" required value="{{$d->email}}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password" name="password" aria-describedby="password" required>
            </div>            

            <div class="mb-3">
                <label for="role_name" class="form-label">Roles</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role_name" value="admin" id="flexRadioDefault1" <?= $d->role_name == "admin" ? 'checked' : '' ?>>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Admin
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role_name" value="penyewa" id="flexRadioDefault2" <?= $d->role_name == "penyewa" ? 'checked' : '' ?>>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Penyewa
                    </label>
                </div>
            </div>

            {{-- <div id="js-format-input"></div> --}}

            <div class="d-grid gap-2 d-md-flex justify-content-md-end pt-3">
            <input type="submit" class="btn btn-warning" value="Ubah Akun">
            </div>
        </form>
        </div>
    </div>
</div>
    @endforeach
    @endsection