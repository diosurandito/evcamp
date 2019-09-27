@extends('templates.organizer.default')

@section('content')
<main id="main-container">

    <!-- Hero -->
    <div class="bg-body-dark">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Buat Event Kampus
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Penyelenggara</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Buat Event</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->

    <div class="content">
<!-- @if ($message = Session::get('success'))
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
@endif -->
<div class="block">

    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Edit Data Event</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="{{ route('organizer.updateevent', $data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <!-- Regular -->
                
                <div class="row items-push">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-12 col-xl-6">
                        <div class="form-group">
                            <label for="">Banner Event <span class="text-danger">*</span> <p class="font-size-sm text-muted">
                                Direkomendasikan 500x340px dan tidak lebih dari 1MB (Max 2MB)
                            </p></label><br/>
                            
                            <!--'preview' di bawah ini adalah id element img-->
                            <input type="file" class="file-input" name="banner" value="{{$data->banner}}" accept="image/*"  onchange="tampilkanPreview(this,'preview')" /><br/>
                            <!--element image untuk menampilkan preview-->
                            <img id="preview" src="{{ asset('public/images/'.$data->banner)}}" alt="" width="500px"/>

                        </div>
                        <div class="form-group">
                            <label for="">Nama Event <span class="text-danger">*</span></label>
                            <input type="text" class="js-maxlength form-control" id="nama_event" name="nama_event" value="{{$data->nama_event}}" maxlength="200" placeholder="Silahkan isi nama event.." data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" required>
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi Event <span class="text-danger">*</span></label>
                            <textarea class="js-maxlength form-control" id="deskripsi" name="deskripsi" rows="3" maxlength="250" placeholder="Silahkan isi deskripsi event .." data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" required>{{$data->deskripsi}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Pihak Penyelenggara Event <span class="text-danger">*</span></label>
                            <input type="text" class="js-maxlength form-control" id="penyelenggara" name="penyelenggara" value="{{$data->penyelenggara}}" maxlength="200" placeholder="Silahkan isi nama pihak penyelenggara.." data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" required>
                        </div>
                        <div class="form-group">
                            <label for="">Detail Lokasi <span class="text-danger">*</span></label>
                            <textarea class="js-maxlength form-control" id="detail_lokasi" name="detail_lokasi" rows="3" maxlength="250" placeholder="Silahkan isi detail lokasi event, misal 'Gedung D Lantai 4 Ruang D.46'" data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" required>{{$data->detail_lokasi}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="kategori_event">Kategori Event <span class="text-danger">*</span></label>
                            
                            <select class="js-select2 form-control" id="kategori_event" name="kategori_event" style="width: 100%;" data-placeholder="Pilih kategori event">
                                <option value="{{$data->kategori_event}}">{{$data->kategori_event}}</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                <option value="Seminar">Seminar</option>
                                <option value="Workshop">Workshop</option>
                                <option value="Hiburan">Hiburan</option>
                                <option value="Olahraga">Olahraga</option>                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tglevent">Tanggal Event <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="from" name="tgl_mulai" value="{{$data->tgl_mulai}}" placeholder="Mulai" required>
                                <div class="input-group-prepend input-group-append">
                                    <span class="input-group-text font-w600">
                                        <i class="fa fa-fw fa-arrow-right"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="to" name="tgl_selesai" value="{{$data->tgl_selesai}}" placeholder="Selesai" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="">Waktu Event <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" value="{{$data->waktu_mulai}}" required>
                                <div class="input-group-prepend input-group-append">
                                    <span class="input-group-text font-w600">
                                        <i class="fa fa-fw fa-arrow-right"></i>
                                    </span>
                                </div>
                                <input type="time" class="form-control" id="waktu_selesai" name="waktu_selesai" value="{{$data->waktu_selesai}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kategori_tiket">Kategori Tiket <span class="text-danger">*</span></label>
                            <select class="js-select2 form-control" id="kategori_tiket" name="kategori_tiket" style="width: 100%;" data-placeholder="Pilih kategori tiket">
                                <option value="{{$data->kategori_tiket}}">{{$data->kategori_tiket}}</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                <option value="Berbayar">Berbayar</option>
                                <option value="Gratis">Gratis</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Tiket <span class="text-danger">*</span></label>
                            <input type="number" min="10" max="100000" class="js-maxlength form-control" id="jumlah" name="jumlah" value="{{$data->jumlah}}" maxlength="6" placeholder="Silahkan isi jumlah tiket.." data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" required>
                        </div>
                        <div class="form-group">
                            <label for="">Harga Tiket <span class="text-danger">*</span></label>
                            <input type="number" oninput="math()" min="0" max="100000000" class="js-maxlength form-control" id="harga_tiket" name="harga_tiket" value="{{$data->ticket->harga}}" maxlength="10" placeholder="Silahkan isikan harga tiket.." data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" required>
                            
                        </div> 
                        <div class="form-group">
                            <label for="">Harga Tiket + Fee (5%) <span class="text-danger">*</span><br><span class="text-muted" style="font-size: 13px">(Harga ini menjadi harga yang akan ditampilkan untuk event Anda.)</span></label>
                            <input type="text" min="0" max="100000000" class="form-control" id="harga_tiket_akhir" name="harga_tiket_akhir" value="{{$data->ticket->harga_fee}}" maxlength="10" readonly>
                        </div>

                        <div class="form-group">
                            <label for="tglevent">Tanggal Penjualan <span class="text-danger">* </span><br><span class="text-muted" style="font-size: 13px">(Tanggal penjualan selesai tidak boleh lebih dari tanggal event berakhir)</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="penj_from" name="tgl_penj_mulai" value="{{$data->tgl_penj_mulai}}" placeholder="Tgl Mulai" required>
                                <div class="input-group-prepend input-group-append">
                                    <span class="input-group-text font-w600">
                                        <i class="fa fa-fw fa-arrow-right"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="penj_to" name="tgl_penj_selesai" value="{{$data->tgl_penj_selesai}}" placeholder="Tgl Selesai" required>
                            </div>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-primary custom-control-lg mb-1">
                            <input type="checkbox" class="custom-control-input" id="example-cb-custom-primary-lg1" name="example-cb-custom-primary-lg1" checked required>
                            <label class="custom-control-label" for="example-cb-custom-primary-lg1"><b class="text-primary">5% dari hasil tiap pembelian tiket akan menjadi profit bagi pihak EVCAMP. </b></label>
                        </div>
                        
                        
                    </div>
                </div>
                <!-- Submit -->
                <div class="row items-push">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-12 col-xl-6 text-right">
                        <a href="{{route('organizer.event.index')}}" type="submit" class="btn bg-gray text-dark">Batal</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <!-- END Submit -->
            </form>
        </div>
    </div>

    <!-- jQuery Validation -->
</div>
<!-- END Page Content -->
</div>
</main>
@endsection