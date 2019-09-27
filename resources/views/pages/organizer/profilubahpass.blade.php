@extends('templates.organizer.default')

@section('content')
<main id="main-container">

                <!-- Hero -->
                <div class="bg-body-dark">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill h3 my-2">
                                Profil Kamu
                            </h1>
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <a class="link-fx" href="">Ubah Password</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

<!-- Page Content -->

<div class="content">
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissable d-flex" role="alert">
    <div class="flex-00-auto">
        <i class="fa fa-fw fa-check"></i>
    </div>
    <div class="flex-fill ml-3">
    <p class="mb-0">{{ $message }}</p>
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="block">
  
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Ubah Password</h3>
        </div>
        <div class="block-content block-content-full">
           <div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    
 
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('organizer.password.update') }}">
 
                        @csrf
                        @method('PATCH')
 
                        <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                            <label for="current_password" class="col-md-4 control-label">Password Sekarang</label>
 
                            <div class="col-md-6">
                                <input id="current_password" type="password" class="form-control" name="current_password" autofocus>
                                <span class="help-block text-danger">{{ $errors->first('current_password') }}</span>
                            </div>
                        </div>
 
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password Baru</label>
 
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">
                                <span class="help-block text-danger">{{ $errors->first('password') }}</span>
                            </div>
                        </div>
 
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password_confirmation" class="col-md-4 control-label">Konfirmasi Password Baru</label>
 
                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                                <span class="help-block text-danger">{{ $errors->first('password_confirmation') }}</span>
                            </div>
                        </div>
 
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Ubah Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>

<!-- jQuery Validation -->
</div>
<!-- END Page Content -->
</div>
</main>
@endsection