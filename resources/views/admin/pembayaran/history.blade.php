@extends('admin.layout.main')

@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">{{$titlePage}}</h1>
  @if (session()->has('success'))
  <div class="alert alert-primary alert-dismissible fade show">
    <strong>{{session('success')}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">{{$titleCard}}</h6>

      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nomor</th>
              <th>Petugas</th>
              <th>Nama Siswa</th>
              <th>NISN</th>
              <th>Tanggal Bayar</th>
              <th>Nominal SPP</th>
              <th>Jumlah Bayar</th>
              <th>Sisa Pembayaran</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @php
            $nomor=1;
            @endphp
            @foreach ($collection as $item)
            @php
            $sisa_pembayaran = $item->siswa->spp->nominal - $item->jumlah_bayar ;
            @endphp
            <tr>
              <td>{{$nomor++}}</td>
              <td>{{$item->petugas->nama}}</td>
              <td>{{$item->siswa->nama}}</td>
              <td>{{$item->nisn}}</td>
              <td>{{$item->tgl_bayar}}</td>
              <td>Rp. {{number_format(intval($item->siswa->spp->nominal),2)}}</td>
              <td>Rp. {{number_format(intval($item->jumlah_bayar),2)}}</td>
              <td>Rp. {{number_format(intval($sisa_pembayaran),2)}}</td>
              <td>
                <a href="{{url('')}}" class="btn btn-success btn-sm"><i class="fa-solid fa-print"></i> Cetak</a>
              </td>

            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection