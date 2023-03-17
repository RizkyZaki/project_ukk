<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riwayat Pembayaran</title>
  <style>
    .container {
      padding-top: 50px;
      margin: 0 50px 0 50px;
    }

    .header {
      display: flex;
      justify-content: center;
    }

    img {
      width: 150px
    }

    .title {
      width: 100%;
      text-align: center;
      line-height: 10px;
    }

    hr {
      height: 2px;
      background-color: black;
    }

    table td.row {
      font-weight: bold;
      padding-right: 100px;
    }

    .footer {
      text-align: center;
    }
  </style>
</head>

<body onload="window.print()">
  <div class="container">
    <div class="header">
      <div class="logo">
        <img src="{{asset('img/logo_login.png')}}" alt="">
      </div>
      <div class="title">
        <h1>Bukti Pembayaran SPP</h1>
        <h3>Siswa/i SMKS Bina Kerja</h3>
        <p>https://smk.co.id</p>
      </div>
    </div>

    <hr>

    <table>
      <tr>
        <td class="row">NISN</td>
        <td>: {{$pembayaran->nisn}}</td>
      </tr>
      <tr>
        <td class="row">Nama Siswa</td>
        <td>: {{$pembayaran->siswa!=null?$pembayaran->siswa->nama : 'kosong'}}</td>
      </tr>
      <tr>
        <td class="row">Tanggal Bayar</td>
        <td>: {{$pembayaran->tgl_bayar}}</td>
      </tr>
      <tr>
        <td class="row">Jumlah Bayar</td>
        <td>: Rp. {{number_format(intval($pembayaran->jumlah_bayar),2)}}</td>
      </tr>
      <tr>
        <td class="row">Pembayaran Bulan</td>
        <td>: {{$pembayaran->bulan_bayar}}</td>
      </tr>
      <tr>
        <td class="row">Tahun</td>
        <td>: {{$pembayaran->tahun_bayar}}</td>
      </tr>
      <tr>
        <td class="row">Keterangan</td>
        <td>: SPP {{$pembayaran->siswa->spp->tahun}}</td>
      </tr>
      <tr>
        <td class="row">Nama Petugas</td>
        <td>: {{$pembayaran->petugas!=null ? $pembayaran->petugas->nama : 'Kosong'}}/td>
      </tr>

    </table>

    <hr>

    <p>Berkas Cetak Ini Merupakan Bukti Resmi status pembayaran biaya spp siswa/i pada bulan
      {{$pembayaran->bulan_bayar}}
      tahun {{$pembayaran->tahun_bayar}} telah <b>Berhasil</b></p>

    <p class="footer">
      &copy; E-SPP {{date('Y')}}
    </p>

  </div>
</body>

</html>