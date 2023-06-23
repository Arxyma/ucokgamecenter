@extends('template')
@section('content')

<div class="page-heading">

</div>

<div class="page-content">
    <section>
        <div class="card">
            <div class="card-header">
                <h3>Data Kaset</h3>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="/kaset/tambah-kaset" class="btn btn-info"> <i class="bi bi-plus-circle-fill"></i> Data Kaset</a>
                    {{-- <a href="/kaset/cetakpdf" target="blank" class="btn btn-warning my-3 ml-2"><i class="bi bi-printer-fill"></i> Cetak PDF</a>
                    <a href="/kaset/export_excel" target="blank" class="btn btn-success my-3 ml-2"><i class="bi bi-filetype-xlsx"></i> Export Excel</a> --}}
                </div>
            </div>
            <div class="card-body">
                <table id="kaset" class="table table-hover table-striped" data-export-title="Data Kaset">
                    <thead>
                        <tr>
                            <th>ID Kaset</th>    
                            <th>Judul</th>    
                            <th>Deskripsi</th>
                            <th>Tanggal Rilis</th>
                            <th>Jumlah Stok</th>
                            <th>Harga Sewa</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    @foreach ($data as $d)

                    <tr>
                        <td>{{$d->id_kaset }}</td>
                        <td>{{$d->judul }}</td>
                        <td>{{$d->deskripsi }}</td>
                        <td>{{$d->tanggal_rilis }}</td>
                        <td>{{$d->jumlah_stok }}</td>
                        <td>{{$d->harga_sewa }}</td>
                        <td>
                            <div class="row">
                            <div class="d-grid gap-1 d-md-flex">
                                <a href='/kaset/ubah/{{ $d->id_kaset }}' class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                <a href='/kaset/hapus/{{ $d->id_kaset}}' onclick="return confirm('Apakah anda ingin menghapus data {{$d->id_kaset}}?')" class="btn btn-sm btn-danger "><i class="bi bi-trash-fill"></i></a>
                            </div>
                            </div>
                        </td>
                    </tr>

                    @endforeach
                </table>
            </div>
        </div>
    </section>
</div>
@endsection