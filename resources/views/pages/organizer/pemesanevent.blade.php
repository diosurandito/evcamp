@extends('templates.organizer.default')


@section('content')
<main id="main-container">

                <!-- Hero -->
                <div class="bg-body-dark">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill h3 my-2">
                                Menu Data Pemesan
                            </h1>
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <a class="link-fx" href="">Event Saya</a>
                                        <li class="breadcrumb-item" aria-current="page">
                                        <a class="link-fx" href="">Data Pemesan</a>

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
    <h3 class="block-title text-white">Data Pemesan</h3>
  </div>
  <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
      <table id="table-organizer" class="table table-bordered table-striped table-hover table-vcenter js-dataTable-full">
<thead class="thead-dark">
   <tr>
      <th width="30">No</th>
      <th>Nama</th>
      <th>ID Transaksi</th>
      <th>Status</th>
      <th width="40">Detail</th>
   </tr>
</thead>
<tbody>
  @php($no = 1)
  @foreach($pmsn as $p)
    <tr>
        <td>{{$no}}</td>
        <td>{{$p->nama}}</td>
        <td>{{$p->id}}</td>
        <td>@if ($p->verifikasi == 0)
              Belum Bayar
            @elseif ($p->verifikasi == 1)
              Menunggu Konfirmasi
            @elseif ($p->verifikasi == 2)
              Lunas
            @else
              Batal Pesan
              
            @endif
        </td>
        <td class="text-center">
          <div class="btn-group">
              <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#show{{$p->id}}" title="Lihat Detail">
                  <b>Detail</b>
              </button>
          </div>
      </td>
    </tr>
    @php($no++)
    <div class="modal fade" id="show{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popin modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-info">
                    <h3 class="block-title">Detail</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content font-size-sm">
                <div class="row">
                <div class="col-lg-8 col-xl-12">
                <form action="{{ route('organizer.pemesanevent', $p->id) }}" method="post">
                @csrf
                @method('GET')
                  
                  <div class="row" style="font-size: 20px">
                  <div class="column col-12 border-bottom">
                      <div class="col-12">
                      <label for="">Nama Pemesan &emsp;&emsp;&emsp;&emsp;&emsp; : {{$p->nama}}</label>
                      </div>
                      
                      <div class="col-12">
                      <label for="">Email Pemesan &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; : {{$p->email}}</label>
                      </div>

                      <div class="col-12">
                      <label for="">Nomor Telpon Pemesan &emsp; : {{$p->no_telp}}</label>
                      </div><br>
                  
      
                  </div>
                  <div class="column col-12"><br>
                      <div class="col-12">
                      <label for="">ID Transaksi &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: {{$p->id}}</label>
                      </div>

                      <div class="col-12">
                      <label for="">Waktu Pemesanan &emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ date('d M Y H:i', strtotime($p->tgl_transaksi)) }}</label>
                      </div>

                      <div class="col-12">
                      <label for="">Kategori Tiket &emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$p->kategori_tiket}}</label>
                      </div>

                      <div class="col-12">
                      <label for="">Tiket &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;: {{$p->jumlah}} x {{$p->nama_event}}</label>
                      </div>

                      <div class="col-12">
                      <label for="">Status Pemesanan &emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp; : @if ($p->verifikasi == 0)
                        Belum Bayar
                      @elseif ($p->verifikasi == 1)
                        Menunggu Konfirmasi
                      @elseif ($p->verifikasi == 2)
                        Lunas
                      @else
                        Batal Pesan
                        
                      @endif</label>
                      </div>

                      <div class="col-12">
                      <label for="">Nama Peserta  &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                      1. {{$p->nm_1}}<br> 
                       &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
                       @if($p->nm_2 != null)
                      2. {{$p->nm_2}} <br>
                      @endif
                      &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
                      @if($p->nm_3 != null)
                      3. {{$p->nm_3}} <br>
                      @endif
                      &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
                      @if($p->nm_4 != null)
                      4. {{$p->nm_4}} <br>
                      @endif
                      &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
                      @if($p->nm_5 != null)
                      5. {{$p->nm_5}}
                      @endif</label>
                      </div>
                  
      
                  </div>
                <div class="block-content block-content-full text-right border-top">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    
                </div>
                </form>
            </div>
        </div>
    </div>
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

