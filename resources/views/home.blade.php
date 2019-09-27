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
  </nav><br>
  <!-- End Navbar -->

<section>
<div class="container" style="margin-top: 100px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white" style="font-size: 18px">Syarat & Ketentuan</div>

                <div class="card-body text-white" style="margin-bottom: 5%">
                    1. Penyelenggara bersedia untuk menerima potongan sebesar 5% dari hasil penjualan tiket event kampus sebagai komisi untuk pihak EVCAMP. <br>
                    <p style="margin-bottom: 12px"> 
                    </p>
                    2. Penyelenggara bersedia untuk menerima bahwa pengiriman hasil penjualan tiket event kampus paling lambat 2x 24 jam setelah tanggal penjualan tiket berakhir. <br>
                    <p style="margin-bottom: 12px"> 
                    </p>
                    3. Penyelenggara yang telah membuat akun pada Situs kami, dapat membuat Event dengan tunduk pada syarat dan ketentuan dalam Ketentuan Penggunaan ini, norma susila, ketertiban umum dan peraturan perundang-undangan yang berlaku. <br>
                    <p style="margin-bottom: 12px"> 
                    </p>
                    4. Event yang Penyelenggara selenggarakan dilarang mengandung unsur, baik dalam bentuk penamaan, isi dari Event, kegiatan yang berada dalam Event, tempat dari Event, dan/atau segala bentuk yang termasuk dari unsur-unsur Event tersebut yang berkaitan dan menjadi suatu kesatuan yang saling terkait dalam Event tersebut baik secara langsung maupun tidak langsung, dimana termasuk dari unsur berupa pelanggaran dari ketentuan peraturan perundang-undangan, pencucian uang, ketertiban umum, kesusilaan, norma yang berlaku, seperti namun tidak terbatas pada bentuk perjudian, prostitusi, provokasi terhadap suku, agama, ras dan antar golongan (SARA) dan/atau golongan tertentu, pemerasan, pornografi, pengancaman, penghinaan, pencemaran nama baik, kekerasan, menakut-nakuti, menyesatkan, bohong, seruan yang menimbulkan rasa kebencian atau permusuhan yang memecah belah, yang seluruh kegiatannya hanya berbentuk pengumpulan uang dan/atau barang tanpa adanya kegiatan acara lain, dan/atau seruan untuk melanggar hukum yang berlaku. <br>

                </div>
            </div>
        </div>
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

