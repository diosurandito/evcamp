@extends('templates.admin.default')


@section('content')
<main id="main-container">

  <!-- Hero -->
  <div class="bg-body-dark">
    <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
        <h1 class="flex-sm-fill h3 my-2">
          Menu Data Pendapatan
        </h1>
        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item" aria-current="page">
              <a class="link-fx" href="">Pendapatan</a>
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- END Hero -->

  <!-- Page Content -->

  <div class="content">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissable d-flex" role="alert">
      <div class="flex-00-auto">
        <i class="fa fa-fw fa-check"></i>
      </div>
      <div class="flex-fill ml-3">
        <p class="mb-0">{{ $message }}</p>
      </div>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    <div class="block">
      <div class="block-header" style="background: #344675;">
        <h3 class="block-title text-white">Pendapatan EVCAMP</h3>
        <a href="{{route('admin.income.cetak')}}" class="btn btn-primary" target="_blank"><span class="fa fa-print"></span> Cetak</a>
      </div>
      <div class="block-content block-content-full">
        <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
        <table id="table-event" class="table table-bordered table-striped table-hover table-vcenter js-dataTable-full" style="font-size: 13px;">
          <thead class="thead-dark">
           <tr>
            <th width="30">No</th>
            <th>ID Event</th>
            <th>Nama Event</th>
            <th width="30">Tiket Terjual</th>
            <th width="100">Harga Tiket</th>
            <th width="100">Harga Tiket + Fee(5%)</th>
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
    </div>
  </div>
</div>

</main>
@endsection

