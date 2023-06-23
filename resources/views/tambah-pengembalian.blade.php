@extends('template')
@section('content')

<div class="page-content">
    <div class="container">
        <div class="mx-5 px-5 card pt-5 pb-5">
            <div class="d-grid gap-2 d-md-block mb-3">
                <a href="/pengembalian" class="btn btn-sm btn-warning"><i class="bi bi-arrow-left-circle-fill"></i> Kembali</a>
            </div>

            <h4><strong>Halaman Tambah Data Pengembalian</strong></h4>

            <form action="/pengembalian/store" method="post">
                {{ csrf_field() }}

                <div class="mb-3">
                    <label for="id_pengembalian" class="form-label">ID Pengembalian</label>
                    <input type="text" class="form-control disabled" id="id_pengembalian" name="id_pengembalian" aria-describedby="id_pengembalian" required value="{{ $newId }}" readonly>
                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label for="id_trx">ID Transaksi</label>
                        <select class="form-control choices_transaksi" name="id_trx" id="id_trx" required>
                            <option selected>---Pilih ID Transaksi---</option>
                            @foreach ($transaksi as $t)
                                <option value="{{ $t->id_trx }}" @if(old('id_trx') == $t->id_trx) selected @endif>{{ $t->id_trx }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>                

                <div class="mb-3">
                    <label for="nama_penyewa" class="form-label">Nama Penyewa</label>
                    <input type="text" class="form-control" id="nama_penyewa" name="nama_penyewa" aria-describedby="nama_penyewa" required value="" readonly>
                </div>

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" aria-describedby="judul" required value="" readonly>
                </div>

                <div class="mb-3">
                    <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                    <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" aria-describedby="tanggal_pengembalian" required readonly>
                </div>
                
                <div class="mb-3">
                    <label for="tanggal_dikembalikan" class="form-label">Tanggal Dikembalikan</label>
                    <input type="date" class="form-control" id="tanggal_dikembalikan" name="tanggal_dikembalikan" aria-describedby="tanggal_penyewaan" required>
                </div>

                <div class="mb-3">
                    <label for="keterlambatan" class="form-label">Keterlambatan</label>
                    <input type="number" class="form-control" id="keterlambatan" name="keterlambatan" aria-describedby="keterlambatan" required>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end pt-3">
                    <input type="submit" class="btn btn-success" value="Simpan Pengembalian">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection