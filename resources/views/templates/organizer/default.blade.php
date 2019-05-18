<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
@include('templates.admin.partials._head')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

   <!-- Header -->
@include('templates.admin.partials._header')
  <!-- End Header -->
  <!-- Sidebar -->
  @include('templates.admin.partials._sidebar')
  <!-- End Sidebar -->
  <!-- Content  -->
  <div class="content-wrapper">
    <section class="content">
        @yield('content')
    </section>
  </div>
  <!-- End Content -->

  <!-- Footer -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      EVCAMP 2019
    </div>
    <strong>Copyright &copy; 2019 <a href="#">EVCAMP</a>.</strong> All rights reserved.
  </footer>
  <!-- End Footer -->
  @include('templates.admin.partials._script')
 
</body>
</html>