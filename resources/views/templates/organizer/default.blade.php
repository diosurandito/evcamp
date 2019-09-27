<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
@include('templates.organizer.partials._head')
<body class="hold-transition skin-blue sidebar-mini">
<div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-dark">


  <!-- Sidebar -->
  @include('templates.organizer.partials._sidebar')
  <!-- End Sidebar -->
   <!-- Header -->
  @include('templates.organizer.partials._header')
  <!-- End Header -->

  <!-- Content  -->
  
  @yield('content')
    
 
  <!-- End Content -->

  <!-- Footer -->
   <!-- Footer -->
            <footer id="page-footer" class="bg-body-light">
                <div class="content py-3">
                    <div class="row font-size-sm">
                        <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-right">
                            <a class="font-w600" href="" target="_blank">EVCAMP</a> &copy; <span data-toggle="year-copy">2019</span>
                        </div>
                        <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-left">
                            
                        </div>
                    </div>
                </div>
            </footer>

            <!-- END Footer -->
</div>
  @include('templates.organizer.partials._script')
 
</body>
</html>