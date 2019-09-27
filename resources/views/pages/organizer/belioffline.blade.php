@extends('templates.organizer.default')

@section('content')
<main id="main-container">

    <!-- Hero -->
    <div class="bg-body-dark">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Beli Offline
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Beli Offline</a>
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
        @if ($message = Session::get('failed'))
        <div class="alert alert-danger alert-dismissable d-flex" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-times"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0">{{ $message }}</p>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if(!Auth::user()->no_rek)
        <div class="alert alert-danger d-flex col-12" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-pencil-alt"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0">Harap lengkapi data diri sebelum membuat event. Anda tidak bisa membuat event sebelum melengkapi data diri. <br><a href="{{ route('organizer.profil') }}"> Klik link ini untuk melengkapi!</a></p>
            </div>

        </div>
        @endif
        <div class="block">

            <div class="block-header" style="background: #344675;">
              <h3 class="block-title text-white">Beli Tiket Event Saya Offline</h3>
              @if(Auth::user()->no_rek)
              <div class="flex-sm-00-auto mt-3 mt-sm-0 ml-sm-3">
                <span class="d-inline-block invisible" data-toggle="appear" data-timeout="350">
                    <button data-toggle="modal" data-target="#belioffline" class="btn btn-primary px-4 py-2">
                        <i class="fa fa-cart-arrow-down mr-1"></i> Beli Offline
                    </button>
                </span>
            </div>
            @endif
        </div><br>
        <div class="container-fluid">
          <div class="row">
              @if($beloff->isEmpty())
              <div class="block-content block-content-full text-center">
                 <img src="{{ asset('public/images/first-user.svg') }}">
                 @if(Auth::user()->no_rek)
                 <div class="flex-sm-00-auto mt-3 mt-sm-0 ml-sm-3">
                    <span class="d-inline-block invisible" data-toggle="appear" data-timeout="350">
                        <button data-toggle="modal" data-target="#belioffline" class="btn btn-primary px-4 py-2">
                            <i class="fa fa-plus mr-1"></i> Beli Offline
                        </button>
                    </span>
                </div><br><br>
                @endif
                <div>
                   <h4 style="margin-bottom: 1px">Hai, terima kasih telah menggunakan layanan EVCAMP</h4>
                   <br><br><br>
               </div>
           </div>
           @else
           <div class="block-content block-content-full">
              <table id="table-organizer" class="table table-bordered table-striped table-hover table-vcenter js-dataTable-full">
                <thead class="thead-dark">
                 <tr>
                  <th width="30">No</th>
                  <th>Nama Event</th>
                  <th>Jumlah Tiket Dibeli</th>
                  <th>Tanggal Beli</th>
              </tr>
          </thead>
          <tbody>
              @php($no = 1)
              @foreach($beloff as $p)
              <tr>
                <td>{{$no}}</td>
                <td>{{$p->nama_event}}</td>
                <td>{{$p->jumlah_beli}}</td>
                <td>{{$p->tgl_beli}}</td>

            </tr>
            @php($no++)

            @endforeach
        </tbody>
    </table>
</div>


@endif
</div>
</div>
</div>
</div>

<div class="modal fade" id="belioffline" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header" style="background: #344675;">
                    <h3 class="block-title">Beli Offline Event Saya</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content font-size-sm">
                    <div class="row">
                        <div class="col-lg-8 col-xl-12">
                            <form action="{{ route('organizer.belioffline.beli') }}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="">Nama Event</label><br>
                                    <div class="form-group has-feedback">
                                        <div class="input-group">
                                            <div class="input-group-prepend">

                                                <span class="input-group-text"><i class="fa fa-calendar"></i>
                                                </span>
                                            </div>
                                            <select class="form-control" id="id_event" name="id_event">

                                              <option value="0">----Pilih Event----</option> 
                                              @foreach ($roles as $key)
                                              <option value="{{ $key->id }}"> 
                                                  {{ $key->nama_event }} ({{ $key->stok_tiket }} tiket) 
                                              </option>
                                              @endforeach  

                                          </select>
                                      </div> 
                                  </div>
                              </div>
                              <div class="form-group">
                                <label for="">Jumlah Beli</label><br>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-cart-arrow-down"></i>
                                        </span>
                                    </div>
                                    <input type="number" class="js-maxlength form-control" id="example-group1-input1" name="jumlah_beli" maxlength="6" placeholder="Masukkan jumlah tiket" data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" required>
                                </div>
                            </div>
                            
                            <div class="block-content block-content-full text-right border-top">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-warning text-white">Beli</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</main>
@endsection

