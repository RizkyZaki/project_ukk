@extends('admin.layout.main')

@section('content')
<div class="container-fluid">

  <h3 class="fw-bold mb-4">{{$titlePage}}</h3>
  <div class="card rounded shadow">
    <div class="card-title bg-primary">
      <h1 class="text-center fw-bold p-4 mb-3 shadow-text text-white">{{$titleCard}}</h1>
    </div>
    <div class="card-body p-3">
      <form action="{{url('petugas')}}" method="post">
        @csrf
        <input type="hidden" name="id_user">
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nisn</label>
              <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn"
                id="id_distributor" placeholder="nisn....">
              @error('nisn')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Tanggal</label>
          <input type="date" class="form-control @error('tgl_bayar') is-invalid @enderror" name="tgl_bayar"
            id="id_distributor" placeholder="XX-XX-XXXX">
          @error('tgl_bayar')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Password</label>
          <input class="form-control @error('password') is-invalid @enderror" name="password" id="id_distributor"
            placeholder="Password...">
          @error('password')
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