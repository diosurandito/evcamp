@extends('templates.admin.default')

@section('content')
<!-- Main Container -->
            <main id="main-container">


                <!-- Hero -->
                <div class="bg-image overflow-hidden" style="background-image: url({{ asset('public/assets/media/photos/photo1.jpg') }});">
                    <div class="bg-primary-dark-op">
                        <div class="content content-narrow content-full">
                            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                                <div class="flex-sm-fill">
                                    <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Dashboard</h1>
                                    <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Selamat Datang Admin EVCAMP</h2>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content content-narrow">
                    <!-- Stats -->
                    <div class="row">
                        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-link-pop border-left border-danger border-4x" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Event</div>
                                    <div class="font-size-h2 font-w400 text-dark">{{$countEvent}}</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-link-pop border-left border-warning border-4x" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Penyelenggara</div>
                                    <div class="font-size-h2 font-w400 text-dark">{{$countOrganizer}}</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Pengguna</div>
                                    <div class="font-size-h2 font-w400 text-dark">{{$countUser}}</div>
                                </div>
                            </a>
                        </div>
                        <!-- <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-link-pop border-left border-success border-4x" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Pendapatan</div>
                                    <div class="font-size-h2 font-w400 text-dark">Rp.9.000.000</div>
                                </div>
                            </a>
                        </div>  -->
                    </div>
                    <!-- END Stats -->
                </main>
@endsection