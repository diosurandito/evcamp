<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Register</title>
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="shortcut icon" sizes="32x32" href="{{ asset('public/assets/media/favicons/logobdwGD.png') }}">
  <link rel="stylesheet" href="{{ asset('public/adminLTE/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/adminLTE/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/adminLTE/plugins/iCheck/square/blue.css') }}">
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="{{ asset('public/images/logoevcamp.png') }}" width="200">
  </div>

  <div class="login-box-body">
    <p class="login-box-msg">Register dan Buat Event Kampusmu Sendiri</p>
    @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

    <form action="{{route('organizer.register')}}" method="post">
    @csrf
    <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Nama" name="nama" value="{{ old('nama') }}" required autofocus>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <select class="form-control" name="id_campus">
           
          <option value="0">----Pilih Nama Kampus----</option> 
          @foreach ($roles as $key)
            <option value="{{ $key->id }}"> 
                {{ $key->nama_kampus }} 
            </option>
          @endforeach  
           
        </select>
      </div>
      <div class="form-group has-feedback">
          <input type="tel" pattern="\+?([ -]?\d+)+|\(\d+\)([ -]\d+)" value="{{ old('no_telp') }}" class="form-control" id="no_telp" name="no_telp" maxlength="15" placeholder="+62xxxxxxxxxxx" data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" required>
          <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Ulangi Password" name="password_confirmation" required autocomplete="new-password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" style="margin: 5px;" required>
                <b style="margin: 3px; font-size: 15px">Dengan mendaftar, saya menyetujui <a style="color: #344675;" href="syarat-ketentuan">syarat dan ketentuan</a>  serta kebijakan privasi EVCAMP.</b>
            </label>
          </div> 
        </div>
      </div>
      

      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
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
