@extends('template')
@section('content')

<div class="page-content">
    <div class="container">
        <div class="mx-5 px-5 card pt-5 pb-5">
            <div class="d-grid gap-2 d-md-block mb-3">
                <a href="/transaksi" class="btn btn-sm btn-warning"><i class="bi bi-arrow-left-circle-fill"></i> Kembali</a>
            </div>

            <h4><strong>Halaman Tambah Data Transaksi</strong></h4>

            <form action="/transaksi/store" method="post">
                {{ csrf_field() }}

                <div class="mb-3">
                    <label for="id_trx" class="form-label">ID Transaksi</label>
                    <input type="text" class="form-control disabled" id="id_trx" name="id_trx" aria-describedby="id_trx" required value="{{ $newId }}" readonly>
                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label for="id_penyewa">ID Penyewa</label>
                        <select class="form-control choices_penyewa" name="id_penyewa" id="id_penyewa" required>
                            <option selected>---Pilih ID Penyewa---</option>
                            @foreach ($penyewa as $p)
                                <option value="{{ $p->id_penyewa }}" @if(old('id_penyewa') == $p->id_penyewa) selected @endif>{{ $p->id_penyewa }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="nama_penyewa" class="form-label">Nama Penyewa</label>
                    <input type="text" class="form-control" id="nama_penyewa" name="nama_penyewa" aria-describedby="nama_penyewa" required value="" readonly>
                </div>

                <div class="mb-3">
                    <label for="no_hp" class="form-label">No. HP</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" aria-describedby="no_hp" required value="" readonly>
                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label for="id_kaset">ID Kaset</label>
                        <select class="form-control choices_kaset" name="id_kaset" id="id_kaset" required>
                            <option selected>---Pilih ID Kaset---</option>
                            @foreach ($kaset as $k)
                                <option value="{{ $k->id_kaset }}" @if(old('id_kaset') == $k->id_kaset) selected @endif>{{ $k->id_kaset }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" aria-describedby="judul" required value="" readonly>
                </div>

                <div class="mb-3">
                    <label for="jumlah_sewa" class="form-label">Jumlah Sewa</label>
                    <input type="number" class="form-control" id="jumlah_sewa" name="jumlah_sewa" placeholder="Masukkan Jumlah Sewa" aria-describedby="jumlah_sewa" required value="">
                </div>

                <div class="mb-3">
                    <label for="harga_sewa" class="form-label">Harga Sewa Satuan</label>
                    <input type="number" class="form-control" id="harga_sewa" name="harga_sewa" aria-describedby="harga_sewa" required value="" readonly>
                </div>

                <div class="mb-3">
                    <label for="total_harga" class="form-label">Total Harga</label>
                    <input type="number" class="form-control" id="total_harga" name="total_harga" aria-describedby="total_harga" required value="" readonly>
                </div>

                <div class="mb-3">
                    <label for="tanggal_penyewaan" class="form-label">Tanggal Penyewaan</label>
                    <input type="date" class="form-control" id="tanggal_penyewaan" name="tanggal_penyewaan" aria-describedby="tanggal_penyewaan" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                    <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" aria-describedby="tanggal_pengembalian" required value="">
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end pt-3">
                    <input type="submit" class="btn btn-success" value="Simpan Transaksi">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection