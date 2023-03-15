@extends('admin.layout.main')

@section('content')
<div class="container-fluid">

  <h3 class="fw-bold mb-4">{{$titlePage}}</h3>
  <div class="card rounded shadow">
    <div class="card-title bg-primary">
      <h1 class="text-center fw-bold p-4 mb-3 shadow-text text-white">{{$titleCard}}</h1>
    </div>
    <div class="card-body p-3">
      <form action="{{url('spp/'.$item->id)}}" method="post">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Tahun</label>
          <input type="number" class="form-control @error('tahun') is-invalid @enderror"
            value="{{old('tahun', $item->tahun)}}" name="tahun" id="id_distributor" placeholder="2xxx">
          @error('tahun')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nominal</label>
          <input class="form-control @error('nominal') is-invalid @enderror" value="{{old('nominal', $item->nominal)}}"
            name="nominal" id="id_distributor" placeholder="Rp.---">
          @error('nominal')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <button class="btn btn-primary" type="submit"><i class="fas fa-solid fa-floppy-disk"></i> Simpan
          Perubahan</button>
        <a class="btn btn-danger" href="{{url('spp')}}"><i class="fa-solid fa-circle-arrow-left"></i> Batal</a>
      </form>
    </div>
  </div>
</div>
@endsection