
<!DOCTYPE html>
<html>
<head>
  <title>Laporan Pendapatan EVCAMP</title>
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
    <h5>Laporan Pendapatan EVCAMP</h4>
    </center>

    <table class='table table-bordered'>
      <thead>
        <tr>
          <th width="5">No</th>
          <th>ID Event</th>
          <th>Nama Event</th>
          <th width="30">Tiket Terjual</th>
          <th width="50">Harga Tiket</th>
          <th width="50">Harga Tiket + Fee(5%)</th>
          <th>Pendapatan Awal Event</th>
          <th>Keuntungan EVCAMP</th>
          <th>Pendapatan Akhir Event</th>   
        </tr>
      </thead>
      <tbody>
        @php($no = 1)
        @php($total = 0)
        @foreach($pendapatan as $data)
        <tr>
          <td>{{$no}}</td>
          <td>{{$data->id_event}}</td>
          <td>{{$data->nama_event}}</td>
          <td>{{$data->tkt_terjual}}</td>
          <td>Rp. {{number_format($data->harga,0,',','.')}}</td>
          <td>Rp. {{number_format($data->harga_fee,0,',','.')}}</td>
          <td>Rp. {{number_format($data->pend_awal,0,',','.')}}</td>
          <td class="bg-success-light">Rp. {{number_format($data->komisi,0,',','.')}}</td>
          <td>Rp. {{number_format($data->pend_akhir,0,',','.')}}</td>


        </tr>
        @php($total += $data->komisi)
        @php($no++)
        @endforeach
      </tbody>
      <tfoot class="bg-success-light">
        <tr style="font-size: 20px">
          <th scope="row" colspan="7">Total Pendapatan EVCAMP</th>
          <td colspan="2"><b>Rp. {{number_format($total,0,',','.')}}</b></td>
        </tr>
      </tfoot>
    </table>

  </body>
  </html>