@extends('templates.organizer.default')

@section('content')
<main id="main-container">

                <!-- Hero -->
                <div class="bg-body-dark">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill h3 my-2">
                                Event Saya
                            </h1>
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <a class="link-fx" href="">Event Saya</a>
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
		    <h3 class="block-title text-white">Event Saya</h3>
		    @if(Auth::user()->no_rek)
		    <div class="flex-sm-00-auto mt-3 mt-sm-0 ml-sm-3">
                <span class="d-inline-block invisible" data-toggle="appear" data-timeout="350">
                    <a class="btn btn-primary px-4 py-2" data-toggle="click-ripple" href="{{ route('organizer.buatevent') }}">
                        <i class="fa fa-plus mr-1"></i> Buat Event
                    </a>
                </span>
            </div>
            @endif
		</div><br>
          <div class="container-fluid">
          <div class="row">
          @if($event->isEmpty())
          <div class="block-content block-content-full text-center">
          	<img src="{{ asset('public/images/first-user.svg') }}">
          	@if(Auth::user()->no_rek)
            <div class="flex-sm-00-auto mt-3 mt-sm-0 ml-sm-3">
                <span class="d-inline-block invisible" data-toggle="appear" data-timeout="350">
                    <a class="btn btn-primary px-4 py-2" data-toggle="click-ripple" href="{{ route('organizer.buatevent') }}">
                        <i class="fa fa-plus mr-1"></i> Buat Event
                    </a>
                </span>
            </div><br><br>
            @endif
            <div>
            	<h4 style="margin-bottom: 1px">Hai, terima kasih telah menggunakan layanan EVCAMP</h4>
	          	<div class="font-size-sm font-w400 text-muted">Silakan buat event kampusmu dengan klik button “Buat Event” di atas.</div><br><br><br>
	        </div>
          </div>
          @else
          @foreach($event as $data)
	          <div class="card-deck mb-5" style="margin: 10px">
		            <div class="card @if (now() > $data->tgl_selesai) bg-danger-light @else bg-primary-lighter @endif" style="width:300px; height: 550px">
		            <div class="options-container fx-item-zoom-in fx-overlay-zoom-in">
		              <img class="card-img-top img-thumbnail" src="{{ asset('public/images/'.$data->banner)}}" alt="No Image" >
		              <div class="options-overlay bg-primary-dark-op">
                        <div class="options-overlay-content">
                            <h3 class="h4 text-white mb-2">{{$data->nama_event}}</h3>
                            @if (now() < $data->tgl_selesai)
                            <a class="btn btn-sm btn-light" href="{{ route('organizer.editevent',$data->id) }}">
	                            <i class="fa fa-pencil-alt text-primary mr-1"></i> Edit
	                        </a>
                            @endif
	                        <button type="button" class="btn btn-sm btn-light" data-toggle="modal" data-target="#destroy{{$data->id}}" title="Hapus">
	                            <i class="fa fa-times text-danger mr-1"></i> Hapus
	                        </button>
                        </div>
                      </div>
                      </div>
		              <div class="card-body text-center">
		                <h5 class="card-title">{{$data->nama_event}}</h5>
		                <p class="card-text">
		                {{$data->kategori_event}}<br>
		                {{$data->nama_kampus}}<br>
		                @if ($data->tgl_mulai == $data->tgl_selesai)
		                {{ date('d M Y', strtotime($data->tgl_mulai)) }}<br>
		                @else
				      	{{ date('d M Y', strtotime($data->tgl_mulai)) }} s/d {{ date('d M Y', strtotime($data->tgl_selesai))}}<br>
				      	@endif
				      	{{date('H:i', strtotime($data->waktu_mulai))}} - {{date('H:i', strtotime($data->waktu_selesai))}}<br>
				      	Rp. {{number_format($data->harga,0,',','.')}}<br>
						</p>
		                <a href="{{ route('organizer.detailevent',$data->id) }}" class="btn btn-primary text-center">Detail Event</a>
		              </div>
		            </div>
	          </div>

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
		                      <a href="{{ route('organizer.hapusevent',$data->id) }}" class="btn btn-danger text-white">Hapus</a>
		                  </div>
		            </div>
		        </div>
		      </div>
		    </div>
            @endforeach 
            @endif
          </div>
        </div>
    </div>
</div>
</main>
@endsection

