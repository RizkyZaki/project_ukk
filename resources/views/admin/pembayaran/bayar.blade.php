@extends('admin.layout.main')

@section('content')
<div class="container-fluid">

  <h3 class="fw-bold mb-4">{{$titlePage}}</h3>
  <div class="card rounded shadow">
    <div class="card-title bg-primary">
      <h1 class="text-center fw-bold p-4 mb-3 shadow-text text-white">{{$titleCard}}</h1>
    </div>
    <div class="card-body p-3">
      <form action="{{url('bayar')}}" method="post">
        @csrf
        <input type="hidden" name="id_petugas">
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nisn</label>
              <select class="form-select @error('nisn') is-invalid @enderror" id="inputGroupSelect1" name="nisn">
                <option selected>Pilih Siswa</option>
                @foreach ($siswa as $s)
                <option value="{{$s->nisn}}">{{ $s->nisn}} | {{$s->nama}}</option>
                @endforeach
              </select>
              @error('nisn')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Tanggal</label>
              <input type="date" class="form-control @error('tgl_bayar') is-invalid @enderror"
                value="{{old('tgl_bayar')}}" name="tgl_bayar" id="id_distributor" placeholder="XX-XX-XXXX">
              @error('tgl_bayar')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Bulan Bayar</label>
              <select class="form-select @error('bulan_bayar') is-invalid @enderror" name="bulan_bayar" id="bulan">
                <option selected>Pilih Bulan</option>
                <option value="Januari">Januari</option>
                <option value="Februari">Februari</option>
                <option value="Maret">Maret</option>
                <option value="April">April</option>
                <option value="Mei">Mei</option>
                <option value="Juni">Juni</option>
                <option value="Juli">Juli</option>
                <option value="Agustus">Agustus</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="November">November</option>
                <option value="Desember">Desember</option>
              </select>
              @error('bulan_bayar')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Tahun Dibayar</label>
              <input type="number" class="form-control @error('tahun_bayar') is-invalid @enderror"
                value="{{old('tahun_bayar')}}" name="tahun_bayar" id="id_distributor" placeholder="2XXX">
              @error('tahun_bayar')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

          </div>
          <input type="hidden" name="id_spp">

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Jumlah Bayar</label>
            <input type="number" class="form-control @error('jumlah_bayar') is-invalid @enderror"
              value="{{old('jumlah_bayar')}}" name="jumlah_bayar" id="id_distributor" placeholder="2XXX">
            @error('jumlah_bayar')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>


        <button class="btn btn-primary" type="submit"><i class="fas fa-solid fa-floppy-disk"></i> Simpan</button>
        <a class="btn btn-danger" href="{{url('history/pembayaran')}}"><i class="fa-solid fa-circle-arrow-left"></i>
          Batal</a>
      </form>
    </div>
  </div>
</div>
@endsection
{{--


<div class="col-md-6">


</div> --}}