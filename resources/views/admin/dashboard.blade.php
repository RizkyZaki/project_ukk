@extends('admin.layout.main')

@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>
  <p>Hello {{auth()->user()->nama}} Sebagai {{auth()->user()->level}}</p>
  <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Total Siswa</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$siswa}}</div>
            </div>
            <div class="col-auto">
              <i class="fa-solid fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Total Kelas</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$kelas}}</div>
            </div>
            <div class="col-auto">
              <i class="fa-solid fa-door-closed fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Total Petugas</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$petugas}}</div>
            </div>
            <div class="col-auto">
              <i class="fa-solid fa-user-shield fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- <div class="card p-3 shadow">

  </div> --}}

  <div class="chart-area">
    <canvas id="myAreaChart"></canvas>
  </div>
</div>
<script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
<script>
  var pembayaranPerbulan = {{json_encode($pembayaranPerbulan); }};
    var bulan = {!!$bulan!!};
    const ctx = document.getElementById('myAreaChart').getContext('2d')
    const chart = new Chart(ctx,{
      type: 'line',
      data:{
        labels: bulan,
        datasets: [{
          label: 'Pembayaran Per Bulan',
          data: pembayaranPerbulan,
          backgroundColor: [
            '#146C94',
          ],
          borderColor: [
            '#146C94',
          ],
        }]
      },
      options: {
        indexAxis: 'y',
        scales: {
          x: {
            beginAtZero: true
          }
        }
      }  
    })
</script>
@endsection