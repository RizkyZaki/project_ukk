@extends('admin.layout.main')

@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>

  </div>


  @if (session('nisn'))
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
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @php
            $nomor=1;
            @endphp
            @foreach ($collection as $item)

            <tr>
              <td>{{$nomor++}}</td>
              <td>{{$item->petugas->nama}}</td>
              <td>{{$item->siswa->nama}}</td>
              <td>{{$item->nisn}}</td>
              <td>{{$item->tgl_bayar}}</td>
              <td>Rp. {{number_format(intval($item->siswa->spp->nominal),2)}}</td>
              <td>Rp. {{number_format(intval($item->jumlah_bayar),2)}}</td>
              <td>
                <a href="{{url('print/'.$item->id)}}" class="btn btn-success btn-sm"><i class="fa-solid fa-print"></i>
                  Cetak</a>
              </td>

            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @else
  <p>Hello {{auth()->user()->nama}} Sebagai {{auth()->user()->level}}</p>
  Dashboard
  @endif


</div>
@endsection