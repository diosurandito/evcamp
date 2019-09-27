
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
                                <i class="si si-drop"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right font-size-sm smini-hide border-0" aria-labelledby="sidebar-themes-dropdown">
                                

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
                        <li class="nav-main-item">
                            <a class="nav-main-link
                            @if (Request::is('admin/home')) active @endif
                            " href="{{ route('admin.home') }}">
                                <i class="nav-main-link-icon si si-speedometer"></i>
                                <span class="nav-main-link-name">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link
                             @if (Request::is('admin/order')) active @endif
                            " href="{{ route('admin.trans.index') }}">
                                <i class="nav-main-link-icon fa fa-bell">@if ($countTrans !=0)
                                <span class="badge badge-danger badge-pill">{{ $countTrans }}</span>
                                @endif</i>
                                <span class="nav-main-link-name">
                                Konfirmasi Pemesanan 
                                </span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link 
                            @if (Request::is('admin/event')) active @endif" href="{{ route('admin.event.index') }}">
                                <i class="nav-main-link-icon fa fa-calendar-alt"></i>
                                <span class="nav-main-link-name">Data Event</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link 
                             @if (Request::is('admin/organizer')) active @endif
                            " href="{{ route('admin.organizer.index') }}">
                                <i class="nav-main-link-icon fa fa-user-tie"></i>
                                <span class="nav-main-link-name">Data Akun Penyelenggara</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link
                            @if (Request::is('admin/visitor')) active @endif" href="{{ route('admin.visitor.index') }}">
                                <i class="nav-main-link-icon fa fa-user-astronaut"></i>
                                <span class="nav-main-link-name">Data Akun Pengguna</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link @if (Request::is('admin/campus')) active @elseif (Request::is('admin/campus/edit/*')) active @endif" href="{{ route('admin.campus.index') }}">
                                <i class="nav-main-link-icon fa fa-university"></i>
                                <span class="nav-main-link-name">Data Kampus</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link @if (Request::is('admin/income')) active @endif" href="{{ route('admin.income.index') }}">
                                <i class="nav-main-link-icon fa fa-wallet"></i>
                                <span class="nav-main-link-name">Pendapatan</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link @if (Request::is('admin/transfer')) active @endif" href="{{ route('admin.transfer.index') }}">
                                <i class="nav-main-link-icon fa fa-rocket"></i>
                                <span class="nav-main-link-name">Kirim Bukti Transfer</span>
                            </a>
                        </li>
                        
                    </ul>
                </div>
                <!-- END Side Navigation -->
            </nav>
            <!-- END Sidebar -->
