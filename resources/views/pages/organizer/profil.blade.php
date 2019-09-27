@extends('templates.organizer.default')

@section('content')
<main id="main-container">

                <!-- Hero -->
                <div class="bg-body-dark">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill h3 my-2">
                                Profil Kamu
                            </h1>
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <a class="link-fx" href="">Profil</a>
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
@if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
<div class="block">
  
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Informasi Dasar</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="{{ route('organizer.updateprofil', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
            
                <!-- Regular -->
                
                <div class="row items-push">
                    <div class="col-lg-3" style="margin: 15px">
                        <div class="form-group">
                            <label for="">Foto</label><br/>
                            <p class="text-muted" style="font-size: 12px;">
                                Direkomendasikan 250x250px dan tidak lebih dari 1MB (Max 2MB)
                            </p
                             <!--'preview' di bawah ini adalah id element img-->
                             <div class="custom-file">
                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom" name="foto" value="{{$data->foto}}" accept="image/*"  onchange="tampilkanPreview(this,'preview')">
                                <label class="custom-file-label" for="example-file-input-custom">Pilih File</label>
                                <img id="preview" src="{{ asset('public/images/'.$data->foto)}}" alt="" width="200px"/>
                            </div>
                            <!-- <input type="file" class="file-input" name="foto" value="{{$data->foto}}" accept="image/*"  onchange="tampilkanPreview(this,'preview')" /><br/>
                            <!--element image untuk menampilkan preview-->
                            <!-- <img id="preview" src="{{ asset('public/images/'.$data->foto)}}" alt="" width="200px"/> --> -->
                        
                        </div>

                    </div>
                    <div class="col-lg-12 col-xl-6">
                        
                        <div class="form-group">
                            <label for="">Nama<span class="text-danger">*</span></label>
                            <input type="text" class="js-maxlength form-control" id="nama" name="nama" value="{{$data->nama}}" maxlength="100" placeholder="Silahkan isi nama .." data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="nama_kampus">Nama Kampus <span class="text-danger">*</span></label>
                            
                            <input class="form-control" id="id_campus" name="id_campus"  value="{{$kampus->nama_kampus}}"  readonly >
                        </div>
                        <div class="form-group">
                            <label for="">No Telpon <span class="text-danger">*</span></label>
                            <input type="tel" pattern="\+?([ -]?\d+)+|\(\d+\)([ -]\d+)" class="js-maxlength form-control js-masked-phone js-masked-enabled" id="jumlah" name="no_telp" value="{{$data->no_telp}}" maxlength="15" placeholder="+62xxxxxxxxxxx" data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" required>
                        </div>

                        <div class="form-group">
                            <label for="nama_kampus">Nama Bank <span class="text-danger">*</span></label>
                            <select class="js-select2 form-control" id="id_campus" name="nama_bank" style="width: 100%;" data-placeholder="Pilih Bank">
                                <option value="{{$data->nama_bank}}">{{$data->nama_bank}}</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                <option value="BCA">BCA</option>
                                <option value="MANDIRI">MANDIRI</option>
                                <option value="BRI">BRI</option>
                                <option value="BNI">BNI</option>
                                <option value="MUAMALAT">MUAMALAT</option>
                                <option value="BCA SYARIAH">BCA SYARIAH</option>
                                <option value="SYARIAH MANDIRI">SYARIAH MANDIRI</option>
                                <option value="BRI SYARIAH">BRI SYARIAH</option>
                                <option value="BNI SYARIAH">BNI SYARIAH</option>
                                
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="">Nama Pemilik Rekening <span class="text-danger">*</span></label>
                            <input type="text" class="js-maxlength form-control" id="nama_akun" name="nama_akun" value="{{$data->nama_akun}}" maxlength="150" placeholder="Masukan nama akun .." data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="">No Rekening <span class="text-danger">*</span></label>
                            <input type="number" class="js-maxlength form-control js-masked-phone js-masked-enabled" id="no_rek" name="no_rek" value="{{$data->no_rek}}" maxlength="30" placeholder="Masukan no rekening .." data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" required>
                        </div>
                 
                        <div class="form-group">
                            <label for="">Foto KTM atau ID Pengenal <span class="text-danger">*</span> <p class="text-muted" style="font-size: 12px">
                                        Direkomendasikan 500x340px dan tidak lebih dari 1MB (Max 2MB)
                                    </p></label><br/>
                            
                             <!--'preview' di bawah ini adalah id element img-->
                            <input type="file" class="file-input" name="foto_ktm" value="{{$data->foto_ktm}}" accept="image/*"  onchange="tampilkanPreview(this,'preview2')" /><br/>
                            <!--element image untuk menampilkan preview-->
                            <img id="preview2" src="{{ asset('public/images/'.$data->foto_ktm)}}" alt="" width="100%"/>
                        
                        </div>
                    </div>

                    
                </div>

<!-- Submit -->
                <div class="row items-push">
                    <div class="col-lg-3" style="margin: 15px"></div>
                    <div class="col-lg-12 col-xl-6">
                        <button type="submit" class="btn btn-primary">Simpan</button>
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