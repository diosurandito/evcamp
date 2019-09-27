<!DOCTYPE html>
<html>
<head>
  <title>Laporan Check-in Pengunjung Event</title>
  <link rel="stylesheet" href="{{ asset('public/adminLTE/bootstrap/css/stackbootstrap.min.css') }}" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <style type="text/css">
    table tr td,
    table tr th{
      font-size: 9pt;
    }
  </style>
  <center>
    <h5>Laporan Check-in Pengunjung Event {{$data->nama_event}}</h4>
    </center>
    <table class='table table-bordered'>
      <thead>
       <tr>
        <th width="30">No</th>
        <th>ID Transaksi</th>
        <th>Nama Peserta</th>
        <th>Kode Tiket</th>
        <th>Chek-in</th>
      </tr>
    </thead>
    <tbody>
      @php($no = 1)
      @foreach($check as $c)
      <tr>
        <td>{{$no}}</td>
        <td>{{$c->id}}</td>
        <td>{{$c->nama_peserta}}</td>
        <td>{{$c->kode_tiket}}</td>
        <td>@if($c->cek_in == null)
          Belum
          @else
          {{date('d M Y H:i', strtotime($c->cek_in))}}
          @endif</td>
        </tr>
        @php($no++)

      </tbody>

      @endforeach
    </table>  
  </body>
  </html>

