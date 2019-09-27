@extends('templates.organizer.default')


@section('content')
<main id="main-container">

  <!-- Hero -->
  <div class="bg-body-dark">
    <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
        <h1 class="flex-sm-fill h3 my-2">
          Check-in Pengunjung
        </h1>
        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item" aria-current="page">
              <a class="link-fx" href="">Event Saya</a>
              <li class="breadcrumb-item" aria-current="page">
                <a class="link-fx" href="">Check-in Pengunjung</a>

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
          <h3 class="block-title text-white">Data Pengunjung</h3>
          <a href="{{route('organizer.checkinevent.cetak', $data->id)}}" class="btn btn-primary" target="_blank"><span class="fa fa-print"></span> Cetak</a>
        </div>
        <div class="block-content block-content-full">
          <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
          <table id="table-organizer" class="table table-bordered table-striped table-hover table-vcenter js-dataTable-full">
            <thead class="thead-dark">
             <tr>
              <th width="30">No</th>
              <th>ID Transaksi</th>
              <th>Nama Peserta</th>
              <th>Kode Tiket</th>
              <th>Chek-in</th>
              <th width="40">Aksi</th>
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

                <td class="text-center">
                  @if ($c->cek_in == null)
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#check{{$c->kode_tiket}}" title="Check-in">
                      <b>Check-in</b>
                    </button>
                  </div>
                  @else 
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-success" title="Checked-in">
                      <b>Checked-in</b>
                    </button>
                  </div>
                  @endif
                </td>
              </tr>
              @php($no++)
              <div class="modal fade" id="check{{$c->kode_tiket}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin modal-block-vcenter" aria-hidden="true">
                <div class="modal-dialog modal-dialog-popin modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                      <div class="block-header bg-amethyst-dark">
                        <h3 class="block-title">Check-in Pengunjung</h3>
                        <div class="block-options">
                          <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                          </button>
                        </div>
                      </div>
                      <div class="block-content font-size-sm">
                        <p>Check-in untuk pengunjung dengan kode tiket <b>{{$c->kode_tiket}}</b> ?</p>
                      </div>
                      <form action="check-in/{{$c->kode_tiket}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="block-content block-content-full text-right border-top">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-success text-white">Check-in</button>

                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              @endforeach
            </tbody>
          </table>  
        </div>
      </div>
    </div>

  </main>
  @endsection

