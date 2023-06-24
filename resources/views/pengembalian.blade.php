@extends('template')
@section('content')

<div class="page-heading">

</div>

<div class="page-content">
    <section>
        <div class="card">
            <div class="card-header">
                <h3>Data Pengembalian</h3>
                @can('admin')
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="/pengembalian/tambah-pengembalian" class="btn btn-info"> <i class="bi bi-plus-circle-fill"></i> Data Pengembalian</a>
                    {{-- <a href="/kaset/cetakpdf" target="blank" class="btn btn-warning my-3 ml-2"><i class="bi bi-printer-fill"></i> Cetak PDF</a>
                    <a href="/kaset/export_excel" target="blank" class="btn btn-success my-3 ml-2"><i class="bi bi-filetype-xlsx"></i> Export Excel</a> --}}
                </div>
                @endcan
            </div>
            <div class="card-body">
                <table id="pengembalian" class="table table-hover table-striped" data-export-title="Data Pengembalian">
                    <thead>
                        <tr>
                            <th>ID Pengembalian</th>    
                            <th>Nama Penyewa</th>    
                            <th>Judul</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Tanggal Dikembalikan</th>
                            <th>Keterlambatan</th>
                        </tr>
                    </thead>
                    @foreach ($data as $d)

                    <tr>
                        <td>{{$d->id_pengembalian }}</td>
                        <td>{{$d->nama_penyewa }}</td>
                        <td>{{$d->judul }}</td>
                        <td>{{$d->tanggal_pengembalian }}</td>
                        <td>{{$d->tanggal_dikembalikan }}</td>
                        <td>{{$d->keterlambatan }}</td>
                    </tr>

                    @endforeach
                </table>
            </div>
        </div>
    </section>
</div>
@endsection