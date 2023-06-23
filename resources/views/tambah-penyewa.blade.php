@extends('template')
@section('content')


<div class="page-content">

<div class="container">
    
    <div class="mx-5 px-5 card pt-5 pb-5">
            <div class="d-grid gap-2 d-md-block mb-3">
                <a href="/penyewa" class="btn btn-sm btn-warning"><i class="bi bi-arrow-left-circle-fill"></i> Kembali</a>
            </div>
    
            <h4><strong>Halaman Tambah Data Penyewa</strong></h4>
    
        <form action="/penyewa/store" method="post">
            {{ csrf_field() }}
            
            <div class="mb-3">
                <label for="id_penyewa" class="form-label">ID Penyewa</label>
                <input type="text" class="form-control disabled" id="id_penyewa" name="id_penyewa" aria-describedby="id_penyewa" required value="{{ $newId }}" readonly>
            </div>
            <div class="mb-3">
                <label for="nama_penyewa" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama_penyewa" name="nama_penyewa" aria-describedby="nama_penyewa" autofocus>
            </div>
            <div class="mb-3">
                <label for="no_ktp" class="form-label">No. KTP</label>
                <input type="number" class="form-control" id="no_ktp" name="no_ktp" aria-describedby="no_ktp" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="no_hp" class="form-label">No. HP</label>
                <input type="number" class="form-control" id="no_hp" name="no_hp" aria-describedby="no_hp" required>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end pt-3">
            <input type="submit" class="btn btn-success" value="Simpan Penyewa">
            </div>
        </form>
        </div>
    </div>
</div>
    
    @endsection