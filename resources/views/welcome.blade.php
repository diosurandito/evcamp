<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('public/lp/img/apple-icon.png') }}">
  <link rel="icon" sizes="32x32" href="{{ asset('public/assets/media/favicons/logobdwGD.png') }}">
  <title>
    EVCAMP
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="{{ asset('public/lp/css/nucleo-icons.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{ asset('public/lp/css/blk-design-system.css?v=1.0.0') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('public/lp/demo/demo.css') }}" rel="stylesheet" />
</head>

<body class="landing-page">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="100">
    <div class="container">
      <div class="navbar-translate">
        
        <a class="text-white" rel="tooltip" title="Buat dan Olah Event Kampusmu Sendiri" data-placement="bottom" target="_blank" style="font: bold;">
        
          <span style="font-size: 16px;"><img src="{{ asset('public/assets/media/favicons/logobdwGD.png') }}" style="width: 27px;"> EVCAMP</span>
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              
            </div>
            <div class="col-6 collapse-close text-right">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav">
        @auth('organizer')
          <li class="nav-item">
            <a class="nav-link" href="{{route('organizer.home')}}">Home</a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Masuk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('register')}}">Daftar</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper">
    <div class="page-header">
      <img src="{{ asset('public/lp/img/blob.png') }}" class="path">
      <img src="{{ asset('public/lp/img/path2.png') }}" class="path2">
      <img src="{{ asset('public/lp/img/triunghiuri') }}.png" class="shapes triangle">
      <img src="{{ asset('public/lp/img/waves.png') }}" class="shapes wave">
      <img src="{{ asset('public/lp/img/patrat.png') }}" class="shapes squares">
      <img src="{{ asset('public/lp/img/cercuri.png') }}" class="shapes circle">
      <div class="content-center">
        <div class="row row-grid justify-content-between align-items-center text-left">
          <div class="col-lg-6 col-md-6">
            <h1 class="text-white">Buat dan Olah Event Kampusmu
              <br/>
              <span class="text-white">Sendiri</span>
            </h1>
            <p class="text-white mb-3">EVCAMP adalah aplikasi pemesanan tiket event kampus yang menyediakan layanan publikasi dan pengelolaan tiket untuk event kampus melalui website dan layanan pemesanan tiket melalui aplikasi mobile android.</p>
            <div class="btn-wrapper mb-3">
              <a href="http://www.mediafire.com/file/ziwld814elv656i/evcampapps.apk/file" target="_blank" class="category text-success d-inline">Unduh aplikasi mobile EVCAMP disini</a>
              <a href="http://www.mediafire.com/file/ziwld814elv656i/evcampapps.apk/file" target="_blank"><i class="tim-icons icon-minimal-right"></i></a>
            </div>
            <div class="btn-wrapper">
              <div class="button-container">
                
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-5">
            <img src="{{ asset('public/lp/img/tiket.png') }}" alt="Circle image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
    <section class="section section-lg">
      <section class="section">
        <img src="{{ asset('public/lp/img/path4.png') }}" class="path">
      </section>
    </section>
    <section class="section section-lg">
      <img src="{{ asset('public/lp/img/path4.png') }}" class="path">
      <img src="{{ asset('public/lp/img/path5.png') }}" class="path2">
      <img src="{{ asset('public/lp/img/path2.png') }}" class="path3">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <h1 class="text-center">Keuntungan Terbaik Yang Anda Dapat</h1>
            <div class="row row-grid justify-content-center">
              <div class="col-lg-3">
                <div class="info">
                  <div class="icon icon-primary">
                    <i class="tim-icons icon-money-coins"></i>
                  </div>
                  <h4 class="info-title">Komisi Rendah</h4>
                  <hr class="line-primary">
                  <p>EVCAMP hanya mengambil 5% dari hasil penjualan tiket event Anda tanpa ada lagi potongan komisi lain.</p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="info">
                  <div class="icon icon-warning">
                    <i class="tim-icons icon-chart-pie-36"></i>
                  </div>
                  <h4 class="info-title">Kemudahan Publikasi</h4>
                  <hr class="line-warning">
                  <p>Publikasi Event Kampus menjadi lebih mudah dan cepat tersebar pada masyarakat luas. </p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="info">
                  <div class="icon icon-success">
                    <i class="tim-icons icon-single-02"></i>
                  </div>
                  <h4 class="info-title">Mudah Kelola Penjualan</h4>
                  <hr class="line-success">
                  <p>Pengelolaan penjualan tiket event menjadi lebih mudah.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section section-lg section-safe">
      <img src="{{ asset('public/lp/img/path5.png') }}" class="path">
      <div class="container">
        <div class="row row-grid justify-content-between">
          <div class="col-md-5">
            <img src="{{ asset('public/lp/img/chester-wade.jpg') }}" class="img-fluid floating">
            <div class="card card-stats bg-danger">
              <div class="card-body">
                <div class="justify-content-center">
                  <div class="numbers">
                    <p class="card-title">100%</p>
                    <p class="card-category text-white">Aman</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card card-stats bg-info">
              <div class="card-body">
                <div class="justify-content-center">
                  <div class="numbers">
                    <p class="card-title">10 K</p>
                    <p class="card-category text-white">Pengguna</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card card-stats bg-default">
              <div class="card-body">
                <div class="justify-content-center">
                  <div class="numbers">
                    <p class="card-title">1015</p>
                    <p class="card-category text-white">Event Kampus</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="px-md-5">
              <hr class="line-success">
              <h3>Fitur Luar Biasa</h3>
              <p>EVCAMP menyediakan beberapa fitur luar biasa demi kenyamanan penyelenggara event dan pengunjung event.</p>
              <ul class="list-unstyled mt-5">
                <li class="py-2">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-success mb-2">
                      <i class="tim-icons icon-vector"></i>
                    </div>
                    <div class="ml-3">
                      <h6>Keamanan Dalam Pembayaran</h6>
                    </div>
                  </div>
                </li>
                <li class="py-2">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-success mb-2">
                      <i class="tim-icons icon-tap-02"></i>
                    </div>
                    <div class="ml-3">
                      <h6>Desain Tampilan Menarik</h6>
                    </div>
                  </div>
                </li>
                <li class="py-2">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-success mb-2">
                      <i class="tim-icons icon-single-02"></i>
                    </div>
                    <div class="ml-3">
                      <h6>Fitur Check-in Pengunjung</h6>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="section section-lg section-coins">
      <img src="{{ asset('public/lp/img/path3.png') }}" class="path">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <hr class="line-info">
            <h1>EVCAMP TIM
              
            </h1>
          </div>
        </div>
        <div class="row">
        <div class="col-md-2">
        </div>
          <div class="col-md-4">
            <div class="card card-coin card-plain">
              <div class="card-header">
                <img src="{{ asset('public/lp/img/ft_dio.jpg') }}" class="img-center img-fluid">
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 text-center">
                    <h4 class="text-uppercase">Dio Surandito</h4>
                    <span>Back-end Developer</span>
                    <hr class="line-primary">
                  </div>
                </div>
                <div class="row">
                  <ul class="list-group">
                    <li class="list-group-item"></li>
                    <li class="list-group-item">Brebes</li>
                    <li class="list-group-item">diosurandito@gmail.com</li>
                    <li class="list-group-item">Politeknik Harapan Bersama</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-coin card-plain">
              <div class="card-header">
                <img src="{{ asset('public/lp/img/ft_zaky.jpg') }}" class="img-center img-fluid">
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 text-center">
                    <h4 class="text-uppercase">Ahmad Zaky Ammar Dany</h4>
                    <span>Front-end Developer</span>
                    <hr class="line-success">
                  </div>
                </div>
                <div class="row">
                  <ul class="list-group">
                    <li class="list-group-item"></li>
                    <li class="list-group-item">Pemalang</li>
                    <li class="list-group-item">ahmadzakyammardany7@gmail.com</li>
                    <li class="list-group-item">Politeknik Harapan Bersama</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-2">
        </div>
          
      </div>
    </section>
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <h1 class="title">EVCAMP</h1>
          </div>
          <div class="col-md-3">
            <ul class="nav">
              
              <li class="nav-item">
                <a href="https://evcamp.site/login" class="nav-link">
                  Login
                </a>
              </li>
              <li class="nav-item">
                <a href="https://evcamp.site/register" class="nav-link">
                  Register
                </a>
              </li>
              
            </ul>
          </div>
          <div class="col-md-3">
            <ul class="nav">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  Contact Us <br>
                  Phone : 087737781051 <br>
                  Email : admin@evcamp.site
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-3">
            <h3 class="title">Follow us:</h3>
            <div class="btn-wrapper profile">
              <a target="_blank" class="btn btn-icon btn-neutral btn-round btn-simple" data-toggle="tooltip" data-original-title="Follow us">
                <i class="fab fa-twitter"></i>
              </a>
              <a target="_blank" class="btn btn-icon btn-neutral btn-round btn-simple" data-toggle="tooltip" data-original-title="Like us">
                <i class="fab fa-facebook-square"></i>
              </a>
              <a target="_blank" class="btn btn-icon btn-neutral  btn-round btn-simple" data-toggle="tooltip" data-original-title="Follow us">
                <i class="fab fa-dribbble"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('public/lp/js/core/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('public/lp/js/core/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('public/lp/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('public/lp/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="{{ asset('public/lp/js/plugins/bootstrap-switch.js') }}"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('public/lp/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
  <!-- Chart JS -->
  <script src="{{ asset('public/lp/js/plugins/chartjs.min.js') }}"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="{{ asset('public/lp/js/plugins/moment.min.js') }}"></script>
  <script src="{{ asset('public/lp/js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
  <!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('public/lp/demo/demo.js') }}"></script>
  <!-- Control Center for Black UI Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('public/lp/js/blk-design-system.min.js?v=1.0.0') }}" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initLandingPageChart();
    });
  </script>
</body>

</html>