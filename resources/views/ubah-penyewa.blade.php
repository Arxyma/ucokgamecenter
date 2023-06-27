@extends('template')
@section('content')

<div class="page-heading">
    <h3>Admin</h3>
</div>

<div class="page-content">

@foreach($data as $d)
<div class="container">
    
    <div class="mx-5 px-5 card pt-5 pb-5">
            <div class="d-grid gap-2 d-md-block mb-3">
                <a href="/penyewa" class="btn btn-sm btn-warning"><i class="bi bi-arrow-left-circle-fill"></i> Kembali</a>
            </div>
    
            <h4><strong>Halaman Ubah Data Penyewa </strong></h4>
    
        <form action="/penyewa/edit" method="post">
            {{ csrf_field() }}
            
            <div class="mb-3">
                <label for="id_penyewa" class="form-label">ID Penyewa</label>
                <input type="text" class="form-control" id="id_penyewa" name="id_penyewa" aria-describedby="id_penyewa" required value="{{$d->id_penyewa}}" readonly>
            </div>
            <div class="mb-3">
                <label for="nama_penyewa" class="form-label">Nama Penyewa</label>
                <input type="text" class="form-control" id="nama_penyewa" name="nama_penyewa" aria-describedby="nama_penyewa" value="{{$d->nama_penyewa}}" autofocus>
            </div>
            <div class="mb-3">
                <label for="no_ktp" class="form-label">No. KTP</label>
                <input type="number" class="form-control" id="no_ktp" name="no_ktp" aria-describedby="no_ktp" required value="{{$d->no_ktp}}">
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" aria-describedby="alamat" required>{{$d->alamat}}</textarea>
            </div>

            <div class="mb-3">
                <label for="no_hp" class="form-label">No. HP</label>
                <input type="number" class="form-control" id="no_hp" name="no_hp" aria-describedby="no_hp" required value="{{$d->no_hp}}">
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end pt-3">
            <input type="submit" class="btn btn-success" value="Ubah Penyewa" >
            </div>
        </form>
        </div>
    </div>
</div>
    
@endforeach
@endsection