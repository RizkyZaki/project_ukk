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
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nama Petugas</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="id_distributor"
            placeholder="Nama....">
          @error('nama')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Username</label>
          <input class="form-control @error('username') is-invalid @enderror" name="username" id="id_distributor"
            placeholder="Username...">
          @error('username')
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