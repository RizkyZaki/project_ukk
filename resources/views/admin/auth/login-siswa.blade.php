<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login Page</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
  <style>
    body {
      background-color: #0f172a;
    }

    #card-login {
      margin-top: 130px;
    }

    .icon {
      padding-left: 23px
    }
  </style>
</head>

<body>

  <div class="container">

    <!-- Outer Row -->
    <div class="row" id="card-login">
      <div class="col-lg-6 mx-auto">
        <div class="card rounded shadow p-5">
          <div class="text-center">
            <img src="{{asset('img/logo_login.png')}}" class="mx-auto img-fluid" alt="">
            <h1 class="fw-bold">Login Siswa</h1>
            <p>Masuk menggunakan Nisn</p>
            {{-- @if(session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
              <strong>{{ session('loginError')}}</strong>
            </div>
            @endif --}}
          </div>
          {{session('nisn')}}
          <form class="user" action="{{url('login/siswa')}}" method="POST">
            @csrf
            <div class="form-group">
              <i class="fas fa-solid fa-user icon"></i>
              <input type="text" class="form-control form-control-user  @error('nisn') is-invalid @enderror"
                id="exampleInputEmail" name="nisn" aria-describedby="emailHelp" placeholder="Enter nisn...">
              @error('nisn')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <button class="btn btn-primary btn-user btn-block">
              Login
            </button>
          </form>
        </div>
      </div>
    </div>

  </div>




  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
  <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>
</body>

</html>