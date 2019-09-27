

  
    <!-- Sidebar -->
            <!--
                Sidebar Mini Mode - Display Helper classes

                Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
                Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                    If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

                Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
                Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
                Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
            -->
            <nav id="sidebar" aria-label="Main Navigation">
                <!-- Side Header -->
                <div class="content-header bg-white-5">
                    <!-- Logo -->
                    <a class="font-w600 text-dual" href="">
                        <img src="{{ asset('public/assets/media/favicons/logobdwGD.png') }}" style="width: 30px;">
                        <span class="smini-hide">
                            <span class="font-w700 font-size-h5">EVCAMP</span>
                        </span>
                    </a>
                    <!-- END Logo -->

                    <!-- Options -->
                    <div>
                        <!-- Color Variations -->
                        <div class="dropdown d-inline-block ml-3">
                            <a class="text-dual font-size-sm" id="sidebar-themes-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="fa fa-palette"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right font-size-sm smini-hide border-0" aria-labelledby="sidebar-themes-dropdown">
                                <!-- Color Themes -->
                                <!-- Layout API, functionality initialized in Template._uiHandleTheme() -->
                                <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="default" href="#">
                                    <span>Default</span>
                                    <i class="fa fa-circle text-default"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="public/assets/css/themes/amethyst.min.css" href="#">
                                    <span>Amethyst</span>
                                    <i class="fa fa-circle text-amethyst"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="public/assets/css/themes/city.min.css" href="#">
                                    <span>City</span>
                                    <i class="fa fa-circle text-city"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="public/assets/css/themes/flat.min.css" href="#">
                                    <span>Flat</span>
                                    <i class="fa fa-circle text-flat"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="public/assets/css/themes/modern.min.css" href="#">
                                    <span>Modern</span>
                                    <i class="fa fa-circle text-modern"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="public/assets/css/themes/smooth.min.css" href="#">
                                    <span>Smooth</span>
                                    <i class="fa fa-circle text-smooth"></i>
                                </a>
                                <!-- END Color Themes -->

                                <div class="dropdown-divider"></div>

                                <!-- Sidebar Styles -->
                                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                <a class="dropdown-item" data-toggle="layout" data-action="sidebar_style_light" href="#">
                                    <span>Sidebar Light</span>
                                </a>
                                <a class="dropdown-item" data-toggle="layout" data-action="sidebar_style_dark" href="#">
                                    <span>Sidebar Dark</span>
                                </a>
                                <!-- Sidebar Styles -->

                                <div class="dropdown-divider"></div>

                                <!-- Header Styles -->
                                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                <a class="dropdown-item" data-toggle="layout" data-action="header_style_light" href="#">
                                    <span>Header Light</span>
                                </a>
                                <a class="dropdown-item" data-toggle="layout" data-action="header_style_dark" href="#">
                                    <span>Header Dark</span>
                                </a>
                                <!-- Header Styles -->
                            </div>
                        </div>
                        <!-- END Themes -->

                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="d-lg-none text-dual ml-3" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                            <i class="fa fa-times"></i>
                        </a>
                        <!-- END Close Sidebar -->
                    </div>
                    <!-- END Options -->
                </div>
                <!-- END Side Header -->

                <!-- Side Navigation -->
                <div class="content-side content-side-full">
                    <ul class="nav-main">
                        <li class="nav-main-heading text-flat"><small>Dashboard</small></li>
                        <li class="nav-main-item">
                            <a class="nav-main-link @if (Request::is('home')) active @endif" href="{{route('organizer.home')}}">
                                <i class="nav-main-link-icon si si-speedometer"></i>
                                <span class="nav-main-link-name">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link @if (Request::is('event-saya')) active @endif" href="{{route('organizer.event.index')}}">
                                <i class="nav-main-link-icon fa fa-calendar-alt"></i>
                                <span class="nav-main-link-name">Event Saya</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link @if (Request::is('beli-offline')) active @endif" href="{{route('organizer.belioffline')}}">
                                <i class="nav-main-link-icon fa fa-cart-arrow-down"></i>
                                <span class="nav-main-link-name">Beli Offline</span>
                            </a>
                        </li>

                        @if(Request::is('event-saya/detail/*'))
                        <li class="nav-main-heading text-smooth"><small>Event Dashboard</small></li>
                         <li class="nav-main-item">
                            <a class="nav-main-link @if (Request::is('event-saya/detail/'.$data->id)) active @endif" href="{{ route('organizer.detailevent', $data->id) }}">
                                <i class="nav-main-link-icon fab fa-font-awesome-alt"></i>
                                <span class="nav-main-link-name">{{$data->nama_event}}</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link @if (Request::is('event-saya/detail/*/penjualan')) active @endif" href="{{route('organizer.penjualanevent', $data->id)}}">
                                <i class="nav-main-link-icon fa fa-chart-bar"></i>
                                <span class="nav-main-link-name">Laporan Penjualan</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link @if (Request::is('event-saya/detail/*/pemesan')) active @endif" href="{{route('organizer.pemesanevent', $data->id)}}">
                                <i class="nav-main-link-icon fa fa-users"></i>
                                <span class="nav-main-link-name">Data Pemesan</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link @if (Request::is('event-saya/detail/*/check-in')) active @endif" href="{{route('organizer.checkinevent', $data->id)}}">
                                <i class="nav-main-link-icon fa fa-clipboard-check"></i>
                                <span class="nav-main-link-name">Check-in</span>
                            </a>
                        </li>
                        

                        @endif

                        @if(Request::is('profil-saya/*'))
                        <li class="nav-main-heading text-warning"><small>Profil Kamu</small></li>
                         <li class="nav-main-item">
                            <a class="nav-main-link @if (Request::is('profil-saya/informasi-dasar')) active @endif" href="{{ route('organizer.profil') }}">
                                <i class="nav-main-link-icon fa fa-user-tie"></i>
                                <span class="nav-main-link-name">Informasi Dasar</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link @if (Request::is('profil-saya/ubah-password')) active @endif" href="{{ route('organizer.password.change') }}">
                                <i class="nav-main-link-icon fa fa-key"></i>
                                <span class="nav-main-link-name">Ubah Password</span>
                            </a>
                        </li>
                        
                        
                        @endif
                    </ul>
                    
                </div>
                <!-- END Side Navigation -->
            </nav>
            <!-- END Sidebar -->
  

  <!-- <aside class="main-sidebar">

    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="header">MENU NAVIGASI</li> 

        <li><a href=""><i class="fa fa-home"></i> <span>Home</span></a></li>
        <li><a href=""><i class="fa fa-bell"></i> <span>Konfirmasi Pemesanan</span></a></li>
        <li><a href=""><i class="fa fa-ticket"></i> <span>Data Event</span></a></li>
        <li><a href=""><i class="fa fa-user"></i> <span>Data User</span></a></li>
        <li><a href=""><i class="fa fa-user-circle-o"></i> <span>Data Penyelenggara</span></a></li>
        
      
        <li><a href="#"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <li><a href="#"><i class="fa fa-cart-plus"></i> <span>Event Saya</span></a></li>
       
      </ul>
    </section>
  </aside> 
  -->