@extends('templates.admin.default')


@section('content')
<main id="main-container">

  <!-- Hero -->
  <div class="bg-body-dark">
    <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
        <h1 class="flex-sm-fill h3 my-2">
          Menu Data Akun Pengguna
        </h1>
        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item" aria-current="page">
              <a class="link-fx" href="">Akun Pengguna</a>
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
        <h3 class="block-title text-white">Data Pengguna</h3>
      </div>
      <div class="block-content block-content-full">
        <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
        <table id="table-organizer" class="table table-bordered table-striped table-hover table-vcenter js-dataTable-full">
          <thead class="thead-dark">
           <tr>
            <th width="30">No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>No Telpon</th>
            <th width="80">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php($no = 1)
          @foreach($visitor as $data)
          <tr>
            <td>{{$no}}</td>
            <td>{{$data->nama}}</td>
            <td>{{$data->email}}</td>
            <td>{{$data->alamat}}</td>
            <td>{{$data->jenis_klmn}}</td>
            <td>{{$data->no_telp}}</td>
            <td class="text-center">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#show{{$data->id}}" title="Lihat Detail">
                  <i class="far fa-eye"></i>
                </button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#destroy{{$data->id}}" title="Hapus Data">
                  <i class="fa fa-fw fa-times"></i>
                </button>
                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#reset_password{{$data->id}}" title="Reset Password">
                  <i class="fa fa-key"></i>
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
                    <h3 class="block-title">Hapus Data Pengunjung</h3>
                    <div class="block-options">
                      <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-fw fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="block-content font-size-sm">
                    <p>Anda akan menghapus data <b>{{$data->nama}}</b> ?</p>
                  </div>
                  <div class="block-content block-content-full text-right border-top">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a href="visitor/destroy/{{ $data->id }}" class="btn btn-danger text-white">Hapus</a>
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
                    <h3 class="block-title">Detail Data Pengunjung</h3>
                    <div class="block-options">
                      <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-fw fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="block-content font-size-sm">
                    <div class="row">
                      <div class="col-lg-8 col-xl-12">
                        <form action="{{ route('admin.visitor.show', $data->id) }}" method="post">
                          @csrf
                          @method('GET')
                          <div class="p-3 text-center" style="background: #344675;">
                            <img class="img-avatar img-avatar100 img-avatar-thumb" src="{{ asset('webevent/uploads/'.$data->foto) }}" alt="" style="width: 190px; height: 190px">
                          </div><br>
                          <div class="form-group row">
                            <div class="col-6">
                              <label for="">Nama Pengunjung</label>
                              <input type="text" class="form-control" value="{{$data->nama}}" name="nama" readonly>
                              
                            </div>
                            <div class="col-6">
                              <label for="">Email Pengunjung</label>
                              <input type="text" class="form-control" value="{{$data->email}}" name="email" readonly>
                            </div>
                            <div class="col-6">
                              <label for="">Alamat Pengunjung</label>
                              <input type="text" class="form-control" value="{{$data->alamat}}" name="alamat" readonly>
                            </div>
                            <div class="col-6">
                              <label for="">Jenis Kelamin Pengunjung</label>
                              <input type="text" class="form-control" value="{{$data->jenis_klmn}}" name="jenis_klmn" readonly>
                            </div>
                            <div class="col-6">
                              <label for="">Nomor Telpon Pengunjung</label>
                              <input type="text" class="form-control" value="{{$data->no_telp}}" name="no_telp" readonly>
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

          <div class="modal fade" id="reset_password{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                  <div class="block-header" style="background: #344675;">
                    <h3 class="block-title">Reset Password Pengguna</h3>
                    <div class="block-options">
                      <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-fw fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="block-content font-size-sm">
                    <div class="row">
                      <div class="col-lg-8 col-xl-12">
                        <form action="{{ route('admin.visitor.reset', $data->id) }}" method="post">
                          @csrf
                          @method('PATCH')
                          <div class="form-group">
                            <label for="">Nama</label><br>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i>
                                </span>
                              </div>
                              <input type="text" class="form-control" id="example-group1-input1" name="nama" value="{{$data->nama}}" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="">Email</label><br>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-envelope"></i>
                                </span>
                              </div>
                              <input type="text" class="form-control" id="example-group1-input1" name="email" value="{{$data->email}}" readonly>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label for="">Password Baru</label><br>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-key"></i>
                                </span>
                              </div>
                              <input type="text" class="js-maxlength form-control" id="newpassword" minlength="6" maxlength="10" name="newpassword" placeholder="Password baru..." data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" required>
                            </div>
                          </div>
                          <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-info text-white">Reset</button>
                          </div>
                        </form>
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

