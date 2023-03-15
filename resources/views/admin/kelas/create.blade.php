@extends('admin.layout.main')

@section('content')
<div class="container-fluid">

  <h3 class="fw-bold mb-4">{{$titlePage}}</h3>
  <div class="card rounded shadow">
    <div class="card-title bg-primary">
      <h1 class="text-center fw-bold p-4 mb-3 shadow-text text-white">{{$titleCard}}</h1>
    </div>
    <div class="card-body p-3">
      <form action="{{url('kelas')}}" method="post">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nama Kelas</label>
          <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" name="nama_kelas"
            id="id_distributor" placeholder="Kelas....">
          @error('nama_kelas')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Kompetensi Keahlian</label>
          <input class="form-control @error('kompetensi_keahlian') is-invalid @enderror" name="kompetensi_keahlian"
            name="kompetensi_keahlian" id="id_distributor" placeholder="Kompetensi">
          @error('kompetensi_keahlian')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <button class="btn btn-primary" type="submit"><i class="fas fa-solid fa-floppy-disk"></i> Simpan</button>
        <a class="btn btn-danger" href="{{url('kelas')}}"><i class="fa-solid fa-circle-arrow-left"></i> Batal</a>
      </form>
    </div>
  </div>
</div>
@endsection