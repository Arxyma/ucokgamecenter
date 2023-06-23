@extends('template')
@section('content')

<div class="page-heading">

</div>

<div class="page-content">
    <section>
        <div class="card">
            <div class="card-header">
                <h3>Data Transaksi</h3>
                @can('admin')
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="/transaksi/tambah-transaksi" class="btn btn-info"> <i class="bi bi-plus-circle-fill"></i> Data Transaksi</a>
                    {{-- <a href="/kaset/cetakpdf" target="blank" class="btn btn-warning my-3 ml-2"><i class="bi bi-printer-fill"></i> Cetak PDF</a>
                    <a href="/kaset/export_excel" target="blank" class="btn btn-success my-3 ml-2"><i class="bi bi-filetype-xlsx"></i> Export Excel</a> --}}
                </div>
                @endcan
            </div>
            <div class="card-body">
                <table id="transaksi" class="table table-hover table-striped" data-export-title="Data Transaksi">
                    <thead>
                        <tr>
                            <th>ID Transaksi</th>    
                            <th>Nama Penyewa</th>    
                            <th>No. HP</th>
                            <th>Judul</th>
                            <th>Jumlah Sewa</th>
                            <th>Harga Sewa Satuan</th>
                            <th>Total Harga</th>
                            <th>Tanggal Penyewaan</th>
                            <th>Tanggal Pengembalian</th>
                        </tr>
                    </thead>
                    @foreach ($data as $d)

                    <tr>
                        <td>{{$d->id_trx }}</td>
                        <td>{{$d->nama_penyewa }}</td>
                        <td>{{$d->no_hp }}</td>
                        <td>{{$d->judul }}</td>
                        <td>{{$d->jumlah_sewa }}</td>
                        <td>{{$d->harga_sewa }}</td>
                        <td>{{$d->total_harga }}</td>
                        <td>{{$d->tanggal_penyewaan }}</td>
                        <td>{{$d->tanggal_pengembalian }}</td>
                    </tr>

                    @endforeach
                </table>
            </div>
        </div>
    </section>
</div>
@endsection