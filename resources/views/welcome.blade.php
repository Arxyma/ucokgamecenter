@extends('template')
@section('content')

<div class="page-heading">
    <h3>Admin</h3>
</div>

<div class="page-content">
  <div class="row">
    <div class="col-6 col-lg-3 col-md-6">
      <div class="card">
        <div class="card-body px-4 py-4-5">
          <div class="row">
            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
              <div class="stats-icon purple mb-2">
                <i class="bi-disc-fill"></i>
              </div>
            </div>
            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
              <h6 class="text-muted font-semibold">
                Kaset
              </h6>
              <h6 class="font-extrabold mb-0">{{ $kaset }}</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-6 col-lg-3 col-md-6">
      <div class="card">
        <div class="card-body px-4 py-4-5">
          <div class="row">
            <div
              class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
            >
              <div class="stats-icon blue mb-2">
                <i class="bi-people-fill"></i>
              </div>
            </div>
            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
              <h6 class="text-muted font-semibold">Penyewa</h6>
              <h6 class="font-extrabold mb-0">{{ $penyewa }}</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-6 col-lg-3 col-md-6">
      <div class="card">
        <div class="card-body px-4 py-4-5">
          <div class="row">
            <div
              class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
            >
              <div class="stats-icon green mb-2">
                <i class="bi-cash-coin"></i>
              </div>
            </div>
            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
              <h6 class="text-muted font-semibold">Transaksi</h6>
              <h6 class="font-extrabold mb-0">{{ $transaksi }}</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-6 col-lg-3 col-md-6">
      <div class="card">
        <div class="card-body px-4 py-4-5">
          <div class="row">
            <div
              class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
            >
              <div class="stats-icon red mb-2">
                <i class="bi-journal-check"></i>
              </div>
            </div>
            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
              <h6 class="text-muted font-semibold">Pengembalian</h6>
              <h6 class="font-extrabold mb-0">{{ $pengembalian }}</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection