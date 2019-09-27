@extends('templates.organizer.default')

@section('content')
<!-- Main Container -->
            <main id="main-container">

                

                <!-- Hero -->
                <div class="bg-image overflow-hidden" style="background-image: url('public/assets/media/photos/photo2.jpg');">
                    <div class="bg-primary-dark-op">
                        <div class="content content-narrow content-full">
                            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                                <div class="flex-sm-fill">
                                    <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Dashboard</h1>
                                    <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Selamat Datang Penyelenggara</h2>
                                </div>
                                @if(Auth::user()->no_rek)
                                <div class="flex-sm-00-auto mt-3 mt-sm-0 ml-sm-3">
                                    <span class="d-inline-block invisible" data-toggle="appear" data-timeout="350">
                                        <a class="btn btn-primary px-4 py-2" data-toggle="click-ripple" href="{{ route('organizer.buatevent') }}">
                                            <i class="fa fa-plus mr-1"></i> Buat Event
                                        </a>
                                    </span>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content content-narrow">
                    <!-- Stats -->
                    <div class="row">
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
                   
                        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Event</div>
                                    <div class="font-size-h2 font-w400 text-dark">{{$countEvent}}</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Transaksi</div>
                                    <div class="font-size-h2 font-w400 text-dark">{{$countTrans}}</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Pendapatan Awal</div>
                                    <div class="font-size-h2 font-w400 text-dark">@if ($pendapatan) 
                                    Rp. {{number_format($pendapatan->pendapatan_awal,0,',','.')}}
                                    @else
                                    Rp. 0
                                    @endif</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Komisi EVCAMP (5%)</div>
                                    <div class="font-size-h2 font-w400 text-dark">@if ($pendapatan) 
                                    Rp. {{number_format($pendapatan->komisi,0,',','.')}}
                                    @else
                                    Rp. 0
                                    @endif</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-3 col-lg-6 col-xl-6">
                            <a class="block block-rounded block-link-pop border-left border-success border-4x" href="javascript:void(0)">
                                <div class="block-content block-content-full bg-success-light">
                                    <div class="font-size-sm font-w600 text-uppercase text-dark">Pendapatan Akhir</div>
                                    <div class="font-size-h2 font-w400 text-dark">@if ($pendapatan) 
                                    Rp. {{number_format($pendapatan->pendapatan_akhir,0,',','.')}}
                                    @else
                                    Rp. 0
                                    @endif</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- END Stats -->
                </main>
@endsection