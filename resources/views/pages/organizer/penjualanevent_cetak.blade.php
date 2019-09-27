<!DOCTYPE html>
<html>
<head>
  <title>Laporan Pendapatan Event</title>
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
    <h5>Laporan Pendapatan Event {{$data->nama_event}}</h4>
  </center>
<table class='table table-bordered'>
<thead>
   <tr>
      <th>Nama Event</th>
      <th>Tiket Terjual</th>
      <th width="60">Harga Tiket</th>
      <th>Harga Tiket + Fee(5%)</th>
      <th>Pendapatan Awal Event</th>
      <th>Komisi EVCAMP</th>
      <th>Pendapatan Akhir Event</th>   
   </tr>
</thead>
<tbody>
  
  
  @foreach($penjualan as $lp)
    <tr>
        <td>{{$lp->nama_event}}</td>
        <td>{{$lp->tkt_terjual}} / {{$lp->jumlah}}</td>
        <td>Rp. {{number_format($lp->harga,0,',','.')}}</td>
        <td>Rp. {{number_format($lp->harga_fee,0,',','.')}}</td>
        <td>Rp. {{number_format($lp->pend_awal,0,',','.')}}</td>
        <td>Rp. {{number_format($lp->komisi,0,',','.')}}</td>
        <td>Rp. {{number_format($lp->pend_akhir,0,',','.')}}</td>
        
        
    </tr>
    
    
</tbody>
<tfoot class="bg-success-light">
        <tr style="font-size: 20px">
            <th scope="row" colspan="6">Total Pendapatan Event</th>
            <td colspan="1"><b>Rp. {{number_format($lp->pend_akhir,0,',','.')}}</b></td>
        </tr>
    </tfoot>
@endforeach
</table>  
</body>
</html>

