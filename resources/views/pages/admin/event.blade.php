@extends('templates.admin.default')


@section('content')
<main id="main-container">

                <!-- Hero -->
                <div class="bg-body-dark">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill h3 my-2">
                                Menu Data Event
                            </h1>
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item">Admin</li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <a class="link-fx" href="">Event</a>
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
    <h3 class="block-title text-white">Data Event</h3>
  </div>
  <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
      <table id="table-event" class="table table-bordered table-striped table-hover table-vcenter js-dataTable-full" style="font-size: 13px;">
<thead class="thead-dark">
   <tr>
      <th width="30">No</th>
      <th>Nama</th>
      <th>Nama Kampus</th>
      <th>Tanggal Event</th>
      <th>Waktu Event</th>
      <th>Kategori Event</th>
      <th>Kategori Tiket</th>
      <th >Harga Tiket</th>
      <th>Jumlah Tiket</th>
      <th width="80">Aksi</th>
   </tr>
</thead>
<tbody>
  @php($no = 1)
  @foreach($event as $data)
    <tr>
        <td>{{$no}}</td>
        <td>{{$data->nama_event}}</td>
        <td>{{$data->nama_kampus}}</td>
        <td>@if ($data->tgl_mulai == $data->tgl_selesai)
                {{ date('d M Y', strtotime($data->tgl_mulai)) }}
            @else
                {{ date('d M Y', strtotime($data->tgl_mulai)) }} s/d {{ date('d M Y', strtotime($data->tgl_selesai))}}
            @endif</td>
        <td>{{date('H:i', strtotime($data->waktu_mulai))}} - {{date('H:i', strtotime($data->waktu_selesai))}}</td>
        <td>{{$data->kategori_event}}</td>
        <td>{{$data->kategori_tiket}}</td>
        <td>Rp. {{number_format($data->harga,0,',','.')}}</td>
        <td>{{$data->jumlah}}</td>
        <td class="text-center">
          <div class="btn-group">
              <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#show{{$data->id}}" title="Lihat Detail">
                  <i class="far fa-eye"></i>
              </button>
              <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#destroy{{$data->id}}" title="Hapus Data">
                  <i class="fa fa-fw fa-times"></i>
              </button>
          </div>
      </td>
    </tr>
    @php($no++)
    <div class="modal fade" id="destroy{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin modal-block-vcenter" aria-hidden="true">
      <div class="modal-dialog modal-dialog-popin modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="block block-themed block-transparent mb-0">
                  <div class="block-header bg-amethyst-dark">
                      <h3 class="block-title">Hapus Data Event</h3>
                      <div class="block-options">
                          <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                              <i class="fa fa-fw fa-times"></i>
                          </button>
                      </div>
                  </div>
                  <div class="block-content font-size-sm">
                      <p>Anda akan menghapus data <b>{{$data->nama_event}}</b> ?</p>
                  </div>
                  <div class="block-content block-content-full text-right border-top">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      <a href="event/destroy/{{ $data->id }}" class="btn btn-danger text-white">Hapus</a>
                  </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="show{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popin modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-info">
                    <h3 class="block-title">Detail Data Event</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content font-size-sm">
                <div class="row">
                <div class="col-lg-8 col-xl-12">
                <form action="{{ route('admin.event.show', $data->id) }}" method="post">
                @csrf
                @method('GET')
                  <div class="p-3 text-center bg-smooth-dark-op">
                      <img class="img-thumb" src="{{ asset('public/images/'.$data->banner) }}" alt="" style="width: 400px; height: 270px">

                  </div><br>
                  <div class="row">
                  <div class="column col-6">
                  <div class="form-group">
                      <div class="col-12">
                            <label for="">Nama Event</label>
                            <input type="text" class=" form-control" value="{{$data->nama_event}}" name="nama_event" readonly>
                        
                      </div><div class="col-12">
                            <label for="">Deskripsi Event</label>
                            <textarea type="text" class="form-control" rows="3" name="deskripsi" readonly>{{$data->deskripsi}}
                            </textarea>
                        
                      </div>
                      
                      <div class="col-12">
                            <label for="">Lokasi Event</label>
                            <input type="text" class=" form-control" value="{{$data->nama_kampus}}" name="nama_kampus" readonly>
                      </div>
                      <div class="col-12">
                            <label for="">Detail Lokasi Event</label>
                            <input type="text" class=" form-control" value="{{$data->detail_lokasi}}" name="detail_lokasi" readonly>
                      </div>
                      <div class="col-12">
                            <label for="">Tanggal Event</label>
                            <input type="text" class=" form-control" value="@if ($data->tgl_mulai == $data->tgl_selesai) {{ date('d M Y', strtotime($data->tgl_mulai)) }} @else {{ date('d M Y', strtotime($data->tgl_mulai)) }} s/d {{ date('d M Y', strtotime($data->tgl_selesai))}} @endif" name="tgl_event" readonly>
                      </div>
                      <div class="col-12">
                            <label for="">Waktu Event</label>
                            <input type="text" class=" form-control" value="{{date('H:i', strtotime($data->waktu_mulai))}} - {{date('H:i', strtotime($data->waktu_selesai))}}" name="waktu_event" readonly>
                      </div>

                      
                    
                  </div>          
                  </div>
                  <div class="column col-6">
                  <div class="form-group">
                      <div class="col-12">
                            <label for="">Nama Akun Penyelenggara</label>
                            <input type="text" class=" form-control" value="{{$data->nama}}" name="nama" readonly>
                      </div>
                      <div class="col-12">
                            <label for="">Nama Pihak Penyelenggara</label>
                            <input type="text" class="form-control" value="{{$data->penyelenggara}}" name="penyelenggara" readonly>
                      </div>
                      <div class="col-12">
                            <label for="">Tanggal Penjualan</label>
                            <input type="text" class="form-control" value="@if ($data->tgl_penj_mulai == $data->tgl_penj_selesai) {{ date('d M Y', strtotime($data->tgl_penj_mulai)) }} @else {{ date('d M Y', strtotime($data->tgl_penj_mulai)) }} s/d {{ date('d M Y', strtotime($data->tgl_penj_selesai))}} @endif" name="tgl_penj" readonly>
                      </div>
                      <div class="col-12">
                            <label for="">Harga Tiket</label>
                            <input type="text" class="form-control" value="Rp. {{number_format($data->harga,0,',','.')}}" name="no_rek" readonly>
                      </div>
                      <div class="col-12">
                            <label for="">Jumlah Tiket</label>
                            <input type="text" class="form-control" value="{{$data->jumlah}}" name="no_rek" readonly>
                      </div>
                      <div class="col-12">
                            <label for="">Tiket yang Masih Tersedia</label>
                            <input type="text" class="form-control" value="{{$data->stok_tiket}}" name="stok_tiket" readonly>
                      </div>
                  </div>
                  </div>
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

