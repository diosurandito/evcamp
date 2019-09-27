@extends('templates.admin.default')


@section('content')
<main id="main-container">

                <!-- Hero -->
                <div class="bg-body-dark">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill h3 my-2">
                                Menu Data Kampus
                            </h1>
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item">Admin</li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <a class="link-fx" href="">Kampus</a>
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
    <h3 class="block-title text-white">Data Kampus</h3>
    <button data-toggle="modal" data-target="#add_campus" class="btn btn-success mr-1 mb-3">
        <i class="fa fa-fw fa-plus mr-1"></i> Tambah Data
    </button>
  </div>
  <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
      <table id="table-organizer" class="table table-bordered table-striped table-hover table-vcenter js-dataTable-full">
<thead class="thead-dark">
   <tr>
      <th width="30">No</th>
      <th>Nama Kampus</th>
      <th>Alamat</th>
      <th>Latitude</th>
      <th>Longitude</th>
      <th width="80">Aksi</th>
   </tr>
</thead>
<tbody>
  @php($no = 1)
  @foreach($campus as $data)
    <tr>
        <td>{{$no}}</td>
        <td>{{$data->nama_kampus}}</td>
        <td>{{$data->alamat}}</td>
        <td>{{$data->latitude}}</td>
        <td>{{$data->longitude}}</td>
        <td class="text-center">
          <div class="btn-group">
              <a href="{{ route('admin.campus.edit',$data->id) }}" class="btn btn-sm btn-warning"  title="Edit Data">
                  <i class="fa fa-edit"></i>
              </a>
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
                <div class="block-header bg-danger">
                    <h3 class="block-title">Hapus Data Kampus</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content font-size-sm">
                    <p>Anda akan menghapus data <b>{{$data->nama_kampus}}</b> ?</p>
                </div>
                <div class="block-content block-content-full text-right border-top">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a href="campus/destroy/{{ $data->id }}" class="btn btn-danger text-white">Hapus</a>
                </div>
            </div>
        </div>
    </div>
    </div>


    @endforeach
</tbody>
</table>
    <div class="modal fade" id="add_campus" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-success">
                    <h3 class="block-title">Tambah Data Kampus</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content font-size-sm">
                <div class="row">
                <div class="col-lg-8 col-xl-12">
                <form action="{{ route('admin.campus.add') }}" method="post">
                @csrf
                @method('POST')
                    <div class="form-group">
                    <label for="">Nama Kampus</label><br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-university"></i>
                                </span>
                            </div>
                            <input type="text" class="js-maxlength form-control" id="example-group1-input1" name="nama_kampus" maxlength="190" placeholder="Isikan nama kampus..." data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" required>
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="">Alamat Kampus</label><br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-map-marked-alt"></i>
                                </span>
                            </div>
                            <textarea class="js-maxlength form-control" name="alamat" maxlength="250" placeholder="Isikan alamat kampus..." data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="map-canvas"></div>
                        
                    </div>
                    <div class="form-group">
                    <label for="">Latitude</label><br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-map-marker-alt"></i>
                                </span>
                            </div>
                            <input type="text" class="js-maxlength form-control" id="lat" maxlength="30" name="latitude" placeholder="Latitude..." data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" required>
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="">Longitude</label><br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-location-arrow"></i>
                                </span>
                            </div>
                            <input type="text" class="js-maxlength form-control" id="lng" maxlength="30" name="longitude" placeholder="Longitude..." data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" required>
                        </div>
                    </div>
                <div class="block-content block-content-full text-right border-top">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info text-white">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>



  </div>
</div>
</div>

</main>
@endsection

