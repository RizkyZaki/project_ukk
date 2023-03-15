@extends('admin.layout.main')

@section('content')
<div class="container-fluid">

  <h3 class="fw-bold mb-4">{{$titlePage}}</h3>
  <div class="card rounded shadow">
    <div class="card-title bg-primary">
      <h1 class="text-center fw-bold p-4 mb-3 shadow-text text-white">{{$titleCard}}</h1>
    </div>
    <div class="card-body p-3">
      <form action="{{url('siswa')}}" method="post">
        @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nisn</label>
              <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn"
                id="id_distributor" placeholder="Nisn....">
              @error('nisn')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nis</label>
              <input type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" id="id_distributor"
                placeholder="nis....">
              @error('nis')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nama</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                id="id_distributor" placeholder="Nama....">
              @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Kelas</label>
              <select class="form-select @error('id_kelas') is-invalid @enderror" id="inputGroupSelect1"
                name="id_kelas">
                <option selected>Pilih Kelas</option>
                @foreach ($kelas as $k)
                <option value="{{$k->id}}">{{ $k->nama_kelas}} | {{$k->kompetensi_keahlian}}</option>
                @endforeach
              </select>
              @error('id_kelas')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Alamat</label>
              <textarea class="form-control" name="alamat" id="id_distributor" placeholder="Alamat..."></textarea>
              @error('alamat')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">No Telepon</label>
              <input type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp"
                id="id_distributor" placeholder="08xxxxx">
              @error('no_telp')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Spp</label>
          <select class="form-select @error('id_spp') is-invalid @enderror" id="inputGroupSelect2" name="id_spp">
            <option selected>Pilih Spp</option>
            @foreach ($spp as $s)
            <option value="{{$s->id}}">{{ $s->tahun}}</option>
            @endforeach
          </select>
          @error('id_spp')
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