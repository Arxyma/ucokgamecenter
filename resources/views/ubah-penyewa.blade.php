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
                <a href="/kaset" class="btn btn-sm btn-warning"><i class="bi bi-arrow-left-circle-fill"></i> Kembali</a>
            </div>
    
            <h4><strong>Halaman Ubah Data Kaset </strong></h4>
    
        <form action="/kaset/edit" method="post">
            {{ csrf_field() }}
            
            <div class="mb-3">
                <label for="id_kaset" class="form-label">ID Kaset</label>
                <input type="text" class="form-control" id="id_kaset" name="id_kaset" aria-describedby="id_kaset" required value="{{$d->id_kaset}}" readonly>
            </div>
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" aria-describedby="judul" value="{{$d->judul}}" autofocus>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{$d->deskripsi}}</textarea>
            </div>
            <div class="mb-3">
                <label for="tanggal_rilis" class="form-label">Tanggal Rilis</label>
                <input type="date" class="form-control" id="tanggal_rilis" name="tanggal_rilis" aria-describedby="tanggal_rilis" required value="{{$d->tanggal_rilis}}">
            </div>

            <div class="mb-3">
                <label for="jumlah_stok" class="form-label">Jumlah Stok</label>
                <input type="number" class="form-control" id="jumlah_stok" name="jumlah_stok" aria-describedby="jumlah_stok" required value="{{$d->jumlah_stok}}">
            </div>
            
            {{-- <div id="js-format-input"></div> --}}

            <div class="mb-3">
                <label for="harga_sewa" class="form-label">Harga Sewa</label>
                <input type="number" onkeyup="harga(this)" class="form-control" id="harga_sewa" name="harga_sewa" aria-describedby="harga_sewa" required value="{{$d->harga_sewa}}">
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end pt-3">
            <input type="submit" class="btn btn-success" value="Ubah Kaset" >
            </div>
        </form>
        </div>
    </div>
</div>
    
@endforeach
@endsection