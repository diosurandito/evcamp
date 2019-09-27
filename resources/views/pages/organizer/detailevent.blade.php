@extends('templates.organizer.default')

@section('content')
<main id="main-container">

                <!-- Hero -->
                <div class="bg-body-dark">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill h3 my-2">
                                {{$data->nama_event}}
                            </h1>
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <a class="link-fx" href="">Event Saya</a>
                                        <li class="breadcrumb-item" aria-current="page">
                                        <a class="link-fx" href="">Detail Event</a>

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
          <div class="container-fluid">
          <div class="row">
	          <div class="card-deck mb-5" style="margin: 10px">
		            <div class="card bg-primary-lighter" style="width:620px;">
		            <div class="options-container fx-item-zoom-in fx-overlay-zoom-in">
		              <img class="card-img-top img-thumbnail" src="{{ asset('public/images/'.$data->banner)}}" alt="No Image" >
		              <div class="options-overlay bg-primary-dark-op">
                        <div class="options-overlay-content">
                            <h3 class="h4 text-white mb-2">{{$data->nama_event}}</h3>
                            <a class="btn btn-sm btn-light" href="{{ route('organizer.editevent',$data->id) }}">
	                            <i class="fa fa-pencil-alt text-primary mr-1"></i> Edit
	                        </a>
	                        <button type="button" class="btn btn-sm btn-light" data-toggle="modal" data-target="#destroy{{$data->id}}" title="Hapus">
	                            <i class="fa fa-times text-danger mr-1"></i> Hapus
	                        </button>
                        </div>
                      </div>
                      </div>
		              <div class="card-body text-center">
		                  <div class="row">
		                  <div class="column col-6">
		                  <div class="form-group">
		                      <div class="col-12">
		                            <label for="">Nama Event</label>
		                            <input type="text" class="form-control text-center" value="{{$data->nama_event}}" name="nama_event" readonly>
		                        
		                      </div><div class="col-12">
		                            <label for="">Deskripsi Event</label>
		                            <textarea type="text" class="form-control" rows="3" name="deskripsi" readonly>{{$data->deskripsi}}
		                            </textarea>
		                        
		                      </div>
		                      
		                      <div class="col-12">
		                            <label for="">Lokasi Event</label>
		                            <input type="text" class="form-control" value="{{$kampus->nama_kampus}}" name="nama_kampus" readonly>

		                      </div>
		                      <div class="col-12">
		                            <label for="">Detail Lokasi Event</label>
		                            <textarea type="text" class="form-control" rows="3" name="detail_lokasi" readonly>{{$data->detail_lokasi}}</textarea>
		                      </div>
		                      <div class="col-12">
		                            <label for="">Tanggal Event</label>
		                            <input type="text" class="form-control text-center" value="@if ($data->tgl_mulai == $data->tgl_selesai) {{ date('d M Y', strtotime($data->tgl_mulai)) }} @else {{ date('d M Y', strtotime($data->tgl_mulai)) }} s/d {{ date('d M Y', strtotime($data->tgl_selesai))}} @endif" name="tgl_event" readonly>
		                      </div>
		                      <div class="col-12">
		                            <label for="">Waktu Event</label>
		                            <input type="text" class="form-control text-center" value="{{date('H:i', strtotime($data->waktu_mulai))}} - {{date('H:i', strtotime($data->waktu_selesai))}}" name="waktu_event" readonly>
		                      </div>
		                    
		                  </div>          
		                  </div>
		                  <div class="column col-6">
		                  <div class="form-group">
		                    
		                      <div class="col-12">
		                            <label for="">Nama Pihak Penyelenggara</label>
		                            <input type="text" class="form-control text-center" value="{{$data->penyelenggara}}" name="penyelenggara" readonly>
		                      </div>
		                      <div class="col-12">
		                            <label for="">Tanggal Penjualan</label>
		                            <input type="text" class="form-control text-center" value="@if ($data->tgl_penj_mulai == $data->tgl_penj_selesai) {{ date('d M Y', strtotime($data->tgl_penj_mulai)) }} @else {{ date('d M Y', strtotime($data->tgl_penj_mulai)) }} s/d {{ date('d M Y', strtotime($data->tgl_penj_selesai))}} @endif" name="tgl_penj" readonly>
		                      </div>
		                      <div class="col-12">
		                            <label for="">Harga Tiket</label>
		                            <input type="text" class="form-control text-center" value="Rp. {{number_format($data->ticket->harga,0,',','.')}}" name="harga_tiket" readonly>
		                      </div>
		                      <div class="col-12">
		                            <label for="">Harga Tiket + Fee (5%)</label>
		                            <input type="text" class="form-control text-center" value="Rp. {{number_format($data->ticket->harga_fee,0,',','.')}}" name="harga_tiket" readonly>
		                      </div>
		                      <div class="col-12">
		                            <label for="">Jumlah Tiket</label>
		                            <input type="text" class="form-control text-center" value="{{$data->jumlah}}" name="jumlah" readonly>
		                      </div>
		                      <div class="col-12">
		                            <label for="">Tiket Tersedia</label>
		                            <input type="text" class="form-control text-center" value="{{$data->ticket->stok_tiket}}" name="stok_tiket" readonly>
		                      </div>
		                  </div>
		                  </div>
		              </div>
		            </div>
	          </div>
          </div>
          <div class="card-deck mb-5" style="margin: 10px">
		            <div class="card bg-light" style="width:390px;">
		              <div class="card-body text-center">
		                <table class="table table-bordered text-center table-vcenter">
		                	
	                		<tr class="bg-default-lighter">
							    <th rowspan="2" width="90"><i class="fa fa-wallet text-primary mr-1 fa-3x"></i></th>
							    <td>Pendapatan Event</td>
							</tr>
							
							<tr class="bg-default-lighter" style="font-size: 20px;">
							    <td><strong style="font-size: 28px">Rp. {{number_format(((($data->jumlah - $data->ticket->stok_tiket) * $data->ticket->harga_fee) - (($data->jumlah - $data->ticket->stok_tiket) * $data->ticket->harga * 5 / 100)),0,',','.')}}</strong> </td>
							</tr>

							<tr class="bg-warning-light">
							    <th rowspan="2" width="90"><i class="fa fa-ticket-alt text-warning mr-1 fa-3x"></th>
							    <td>Tiket Terjual</td>
							</tr>
							<tr class="bg-warning-light" style="font-size: 20px;">
							    <td><strong style="font-size: 28px">{{$data->jumlah - $data->ticket->stok_tiket}} /</strong> {{$data->jumlah}}</td>
							</tr>

							<tr class="bg-success-light">
							    <th rowspan="2" width="90"><i class="far fa-credit-card text-success mr-1 fa-3x"></i></th>
							    <td>Transaksi</td>
							</tr>
							<tr class="bg-success-light" style="font-size: 20px;">
							    <td><strong style="font-size: 28px">{{count($trans)}}</strong></td>
							</tr>

							@if (now() > $data->tgl_selesai)
							<tr class="bg-danger-light">
							    <th rowspan="2" width="90"><i class="fab fa-font-awesome-alt text-flat mr-1 fa-3x"></i></th>
							    <td>Status Event</td>
							</tr>
							<tr class="bg-danger-light" style="font-size: 20px;">
							    <td><strong style="font-size: 28px">Berlalu</strong></td>
							</tr>
							@else
							<tr class="bg-flat-lighter">
							    <th rowspan="2" width="90"><i class="fab fa-font-awesome-alt text-flat mr-1 fa-3x"></i></th>
							    <td>Status Event</td>
							</tr>
							<tr class="bg-flat-lighter">
								<td><strong style="font-size: 28px">Aktif</strong></td>
							</tr>    
							@endif
		                	
		                </table>
		                @if (now() > $data->tgl_selesai)
		                <button style="font-size: 20px" type="button" data-toggle="modal" data-target="#showbukti" title="Lihat Bukti Transfer">
		                  <i class="fa fa-money-check-alt fa-x1" style="color: #344675;" > Lihat Bukti Transfer Hasil</i>
		                </button>
		                @endif


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

		<div class="modal" id="showbukti" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Bukti Transfer Hasil Penjualan Tiket Event {{$data->nama_event}}</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <div class="block-content font-size-sm">
                    <form action="" method="post">
                    @csrf
                    @method('GET')
                      <div class="row">
                      <div class="p-3 text-center bg-smooth-dark-op">
                      <img class="col-12 img-thumb" src="{{ asset('public/images/'.$data->bukti_transfer_hasil) }}" alt="">
                      </div>
                      

                      </div>
                    </form>
                    </div>
                    <div class="block-content block-content-full text-right border-top">
                        <button type="button" class="btn btn-sm btn-dark_light" data-dismiss="modal">Tutup</button>
                        
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

