@extends('templates.admin.default')


@section('content')
<main id="main-container">

                <!-- Hero -->
                <div class="bg-body-dark">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill h3 my-2">
                                Menu Konfirmasi Data Pesanan
                            </h1>
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item">Admin</li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <a class="link-fx" href="">Konfirmasi Pesanan</a>
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
    <h3 class="block-title text-white">Data Pesanan</h3>
  </div>
  <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
      <table id="table-event" class="table table-bordered table-striped table-hover table-vcenter js-dataTable-full" style="font-size: 13px;">
<thead class="thead-dark">
   <tr>
      <th width="30" style="font-size: 13px;">No</th>
      <th width="30" style="font-size: 13px;">ID</th>
      <th style="font-size: 13px;">Nama Pemesan</th>
      <th style="font-size: 13px;">Nama Event</th>
      <th style="font-size: 13px;">Harga Tiket</th>
      <th style="font-size: 13px;">Jumlah Pesan</th>
      <th style="font-size: 13px;">Total Harga</th>
      <th style="font-size: 13px;">Tanggal Pesan</th>
      <th style="font-size: 13px;">Status</th>
      <th width="40" style="font-size: 13px;">Lihat Bukti</th>
      <th width="90" style="font-size: 13px;">Aksi</th>
   </tr>
</thead>
<tbody>
  @php($no = 1)
  @foreach($trans as $data)
    <tr>
        <td>{{$no}}</td>
        <td>{{$data->id}}</td>
        <td>{{$data->nama}}</td>
        <td>{{$data->nama_event}}</td>
        <td>Rp. {{number_format($data->harga,0,',','.')}}</td>
        <td>{{$data->jumlah}}</td>
        <td>Rp. {{number_format($data->harga*$data->jumlah,0,',','.')}}</td>
        <td>{{date('d M Y H:i', strtotime($data->tgl_transaksi))}}</td>
        <td>@if ($data->verifikasi == 0)
              Belum Bayar
            @elseif ($data->verifikasi == 1)
              Menunggu Konfirmasi
            @elseif ($data->verifikasi == 2)
              Terkonfirmasi
            @elseif ($data->verifikasi == 3)
              Batal Pesan
            @else
              Pesanan Ditolak
              
            @endif
        </td>
        <td class="text-center">
          <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#show{{$data->id}}" title="Lihat Bukti">
                  <i class="fa fa-money-check-alt"></i>
              </button>
        </td>
        <td class="text-center">
          <div class="btn-group">
              @if ($data->verifikasi == 1)
              <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#confirm{{$data->id}}" title="Konfirmasi">
                  <i class="fa fa-check"></i>
              </button>
              <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#cancel{{$data->id}}" title="Tolak">
                  <i class="fa fa-fw fa-times"></i>
              </button>
              @else
              <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#destroy{{$data->id}}" title="Hapus Data">
                  <i class="fa fa-fw fa-trash"></i>
              </button>
              @endif

          </div>
      </td>
      
    </tr>
    @php($no++)
    <div class="modal fade" id="destroy{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin modal-block-vcenter" aria-hidden="true">
      <div class="modal-dialog modal-dialog-popin modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="block block-themed block-transparent mb-0">
                  <div class="block-header bg-amethyst-dark">
                      <h3 class="block-title">Hapus Data Pesanan</h3>
                      <div class="block-options">
                          <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                              <i class="fa fa-fw fa-times"></i>
                          </button>
                      </div>
                  </div>
                  <div class="block-content font-size-sm">
                      <p>Anda akan menghapus data ID Pesanan <b>{{$data->id}}</b> atas nama <b>{{$data->nama}}</b> ?</p>
                  </div>
                  <div class="block-content block-content-full text-right border-top">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      <a href="order/destroy/{{ $data->id }}" class="btn btn-danger text-white">Hapus</a>
                  </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="confirm{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin modal-block-vcenter" aria-hidden="true">
      <div class="modal-dialog modal-dialog-popin modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="block block-themed block-transparent mb-0">
                  <div class="block-header bg-amethyst-dark">
                      <h3 class="block-title">Konfirmasi Data Pesanan</h3>
                      <div class="block-options">
                          <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                              <i class="fa fa-fw fa-times"></i>
                          </button>
                      </div>
                  </div>
                  <div class="block-content font-size-sm">
                      <p>Anda yakin akan mengkonfirmasi ID Pesanan <b>{{$data->id}}</b> atas nama <b>{{$data->nama}}</b> ?</p>
                  </div>
                  <form action="{{ route('admin.order.confirm', $data->id) }}" method="post">
                  @csrf
                  @method('PATCH')
                  <div class="block-content block-content-full text-right border-top">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-success text-white">Konfirmasi</button>
                      
                  </div>
                  </form>
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="cancel{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin modal-block-vcenter" aria-hidden="true">
      <div class="modal-dialog modal-dialog-popin modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="block block-themed block-transparent mb-0">
                  <div class="block-header bg-amethyst-dark">
                      <h3 class="block-title">Tolak Pesanan</h3>
                      <div class="block-options">
                          <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                              <i class="fa fa-fw fa-times"></i>
                          </button>
                      </div>
                  </div>
                  <div class="block-content font-size-sm">
                      <p>Pesanan dengan ID Pesanan <b>{{$data->id}}</b> atas nama <b>{{$data->nama}}</b> akan ditolak.</p>
                  </div>
                  <form action="{{ route('admin.order.cancel', $data->id) }}" method="post">
                  @csrf
                  @method('PATCH')
                  <div class="block-content block-content-full text-right border-top">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-danger text-white">Tolak</button>
                      
                  </div>
                  </form>
            </div>
        </div>
    </div>
    </div>
<!-- Vertically Centered Block Modal -->
    <div class="modal" id="show{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Bukti Pembayaran ID Pesanan {{$data->id}}</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <div class="block-content font-size-sm">
                    <form action="{{ route('admin.order.show', $data->id) }}" method="post">
                    @csrf
                    @method('GET')
                      <div class="row">
                      <div class="p-3 text-center bg-smooth-dark-op">
                      <img class="col-12 img-thumb" src="{{ asset('android/images/struk/'.$data->bukti_bayar) }}" alt="">
                      </div>
                      

                      </div>
                    </form>
                    </div>
                    <div class="block-content block-content-full text-right border-top">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Tutup</button>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Vertically Centered Block Modal -->
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

