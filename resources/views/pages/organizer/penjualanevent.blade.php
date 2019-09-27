@extends('templates.organizer.default')


@section('content')
<main id="main-container">

  <!-- Hero -->
  <div class="bg-body-dark">
    <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
        <h1 class="flex-sm-fill h3 my-2">
          Laporan Penjualan
        </h1>
        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item" aria-current="page">
              <a class="link-fx" href="">Event Saya</a>
              <li class="breadcrumb-item" aria-current="page">
                <a class="link-fx" href="">Laporan Penjualan</a>

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
          <h3 class="block-title text-white">Laporan Penjualan Event</h3>
          <a href="{{route('organizer.penjualanevent_cetak', $data->id)}}" class="btn btn-primary" target="_blank"><span class="fa fa-print"></span> Cetak</a>
        </div>
        <div class="block-content block-content-full">
          <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
          <table id="table-event" class="table table-bordered table-striped table-hover table-vcenter js-dataTable-full" style="font-size: 13px;">
            <thead class="thead-dark">
             <tr>
              <th>Nama Event</th>
              <th>Tiket Terjual</th>
              <th>Harga Tiket</th>
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
      </div>
    </div>
  </div>

</main>
@endsection

