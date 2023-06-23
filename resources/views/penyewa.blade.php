@extends('template')
@section('content')

<div class="page-heading">

</div>

<div class="page-content">
    <section>
        <div class="card">
            <div class="card-header">
                <h3>Data Penyewa</h3>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="/penyewa/tambah-penyewa" class="btn btn-info"> <i class="bi bi-plus-circle-fill"></i> Data Penyewa</a>
                    {{-- <a href="/penyewa/cetakpdf" target="blank" class="btn btn-warning my-3 ml-2"><i class="bi bi-printer-fill"></i> Cetak PDF</a>
                    <a href="/penyewa/export_excel" target="blank" class="btn btn-success my-3 ml-2"><i class="bi bi-filetype-xlsx"></i> Export Excel</a> --}}
                </div>
            </div>
            <div class="card-body">
                <table id="penyewa" class="table table-hover table-striped" data-export-title="Data Penyewa">
                    <thead>
                        <tr>
                            <th>ID Penyewa</th>    
                            <th>Nama Penyewa</th>    
                            <th>No. KTP</th>
                            <th>Alamat</th>
                            <th>No. HP </th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    @foreach ($data as $d)

                    <tr>
                        <td>{{$d->id_penyewa }}</td>
                        <td>{{$d->nama_penyewa }}</td>
                        <td>{{$d->no_ktp }}</td>
                        <td>{{$d->alamat }}</td>
                        <td>{{$d->no_hp }}</td>
                        <td>
                            <div class="row">
                            <div class="d-grid gap-1 d-md-flex">
                                <a href='/penyewa/ubah/{{ $d->id_penyewa }}' class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                <a href='/penyewa/hapus/{{ $d->id_penyewa}}' onclick="return confirm('Apakah anda ingin menghapus data {{$d->id_penyewa}}?')" class="btn btn-sm btn-danger "><i class="bi bi-trash-fill"></i></a>
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