@extends('template')
@section('content')

<div class="page-heading">

</div>

<div class="page-content">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <section>
        <div class="card">
            <div class="card-header">
                <h3>Data Akun {{ucfirst($role_name)}}</h3>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="/akun/tambah-akun" class="btn btn-info"> <i class="bi bi-plus-circle-fill"></i> Data Akun</a>
                </div>
            </div>
            <div class="card-body">
                <table id="akun" class="table table-hover table-striped" data-export-title="Data Akun {{ucfirst($role_name)}}">
                    <thead>
                        <tr>
                            {{-- <th>ID Akun</th> --}}
                            <th>No. </th>    
                            <th>Nama</th>    
                            <th>E-mail</th>
                            <th>Role</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <?php $i = 1 ?>
                    @foreach ($data as $d)
                    <tr>
                        {{-- <td>{{$d->id }}</td> --}}
                        <td>{{ $i }}</td>
                        <td>{{$d->name }}</td>
                        <td>{{$d->email }}</td>
                        <td>{{$d->role_name }}</td>
                        <td>
                            <div class="row">
                            <div class="d-grid gap-1 d-md-flex">
                                <a href='/akun/ubah/{{ $d->id }}' class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                <a href='/akun/hapus/{{ $d->id}}' onclick="return confirm('Apakah anda ingin menghapus data {{$d->name}}?')" class="btn btn-sm btn-danger "><i class="bi bi-trash-fill"></i></a>
                            </div>
                            </div>
                        </td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
</div>
@endsection