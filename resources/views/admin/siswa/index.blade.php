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
        <a href="{{url('siswa/create')}}" class="btn btn-sm btn-primary"><i class="fas fa-solid fa-circle-plus"></i>
          Tambah Data Siswa</a>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nisn</th>
              <th>Nis</th>
              <th>Nama</th>
              <th>Kelas & Kompetensi</th>
              <th>Alamat</th>
              <th>No Telp</th>
              <th>Nominal Spp</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($collection as $item)
            <tr>
              <td>{{$item->nisn}}</td>
              <td>{{$item->nis}}</td>
              <td>{{$item->nama}}</td>
              <td>{{$item->kelas->nama_kelas}} | {{$item->kelas->kompetensi_keahlian}}</td>
              <td>{{$item->alamat}}</td>
              <td>{{$item->no_telp}}</td>
              <td>{{$item->spp->tahun}}</td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Action
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item bg-success text-white"
                        href="{{url('siswa/'. $item->nisn . '/edit')}}"><i class="fa-solid fa-pen-to-square"></i>
                        Ubah</a></li>
                    <li>
                      <form action="siswa/{{$item->nisn}}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="dropdown-item bg-danger text-white" role="button"><i
                            class="fa-solid fa-trash"></i> Hapus</button>
                      </form>
                    </li>
                  </ul>
                </div>
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