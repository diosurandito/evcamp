@extends('templates.admin.default')


@section('content')
<main id="main-container">

                <!-- Hero -->
                <div class="bg-body-dark">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill h3 my-2">
                                Menu Kirim Bukti Transfer
                            </h1>
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item">Admin</li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <a class="link-fx" href="">Kirim Bukti Transfer</a>
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
    <h3 class="block-title text-white">Kirim Bukti Transfer Hasil Pendapatan Event</h3>
  </div>
  <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
      <table id="table-event" class="table table-bordered table-striped table-hover table-vcenter js-dataTable-full" style="font-size: 13px;">
<thead class="thead-dark">
   <tr>
      <th width="30">No</th>
      <th>Nama Event</th>
      <th>Tanggal Event Selesai</th>
      <th>Pendapatan Akhir Event</th>     
      <th>Nama Akun Bank Penyelenggara</th>   
      <th>Nama Bank</th>   
      <th>No Rekening Penyelenggara</th>   
      <th width="30">Aksi</th>   
   </tr>
</thead>
<tbody>
  @php($no = 1)
  @foreach($transferhasil as $data)
    <tr>
        <td>{{$no}}</td>
        <td>{{$data->nama_event}}</td>
        <td>{{date('d M Y', strtotime($data->tgl_selesai))}}</td>
        <td>Rp. {{number_format($data->pend_akhir,0,',','.')}}</td>
        
        <td>{{$data->nama_akun}}</td>
        <td>{{$data->nama_bank}}</td>
        <td>{{$data->no_rek}}</td>
        <td class="text-center">
          @if ($data->bukti_transfer_hasil == null)
          <div class="btn-group">
              <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#trans{{$data->id_event}}" title="Transfer Hasil">
                  <b>Kirim Bukti</b>
              </button>
          </div>
          @else
          <div class="btn-group">
              <button type="button" class="btn btn-sm btn-success" title="Sudah Kirim Bukti Transfer">
                      <i class="fa fa-check"></i>
              </button>
          </div>
          @endif
        </td>
    </tr>
    @php($no++)
       <div class="modal fade" id="trans{{$data->id_event}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popin modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header" style="background: #344675;>
                    <h3 class="block-title">Upload Struk Transfer Hasil</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content font-size-sm">
                <div class="row">
                <div class="col-lg-8 col-xl-12">
                <form action="{{ route('admin.transfer.send', $data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                    
                    <div class="form-group">
                            <label for="">Struk Hasil Transfer</label><br/>
                            <p class="text-muted" style="font-size: 12px;">
                                Direkomendasikan 750x300px dan tidak lebih dari 1MB (Max 2MB)
                            </p
                             <!--'preview' di bawah ini adalah id element img-->
                             <div class="custom-file">
                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom" name="bukti_transfer_hasil" accept="image/*"  onchange="tampilkanPreview(this,'preview')">
                                <label class="custom-file-label" for="example-file-input-custom">Pilih File</label>
                                
                            </div>
                            <div class="text-center">
                              <img id="preview" src="" width="750px"/>
                            </div>
                        
                        </div>   
                <div class="block-content block-content-full text-right border-top">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info text-white">Kirim</button>
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

