<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Log in</title>
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="shortcut icon" sizes="32x32" href="{{ asset('public/assets/media/favicons/logobdwGD.png') }}">
  <link rel="stylesheet" href="{{ asset('public/adminLTE/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/adminLTE/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/adminLTE/plugins/iCheck/square/blue.css') }}">


  <style>
.adm-image {
  background-image: url("{{ asset('public/images/bglogin4.jpg') }}");
  background-color: #cccccc;
  height: 620px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

</style>
</head>

<body class="hold-transition login-page adm-image">
<div class="login-box">
  <div class="login-logo">
    <img src="{{ asset('public/images/logoevcamp.png') }}" width="200">
  </div>

  <div class="login-box-body">
    <p class="login-box-msg">LOGIN ADMIN EVCAMP</p>
    @if(\Session::has('alert'))
                
                <div class="alert alert-danger alert-dismissable d-flex" role="alert">
                  <div class="flex-00-auto">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <div class="flex-fill ml-3">
                  <p class="mb-0">{{Session::get('alert')}}</p>
                  </div>
                  
              </div>
        @endif
  
    <form action="{{route('admin.login')}}" method="post">
    @csrf
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>
          </div>
        </div>

        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>

      </div>
    </form>

  </div>

</div>

<script src="{{ asset('public/adminLTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('public/adminLTE/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/adminLTE/plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' 
    });
  });
</script>
</body>
</html>
