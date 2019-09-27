@extends('templates.admin.default')

@section('content')
<main id="main-container">

                <!-- Hero -->
                <div class="bg-body-dark">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill h3 my-2">
                                Edit Data Kampus
                            </h1>
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item">Admin</li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <a class="link-fx" href="">Kampus</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <a class="link-fx" href="">Edit</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

<!-- Page Content -->

<div class="content">
<!-- @if ($message = Session::get('success'))
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
@endif -->
<div class="block">
  
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Edit Data Kampus</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="{{ route('admin.campus.update', $data->id) }}" method="post">
                @csrf
                @method('PATCH')
            
                <!-- Regular -->
                
                <div class="row items-push">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-12 col-xl-6">
                    <div class="form-group">
                    <label for="">Nama Kampus</label><br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-university"></i>
                                </span>
                            </div>
                            <input type="text" value="{{$data->nama_kampus}}" class="js-maxlength form-control" id="example-group1-input1" name="nama_kampus" maxlength="190" placeholder="Isikan nama kampus..." data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" required>
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="">Alamat Kampus</label><br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-map-marked-alt"></i>
                                </span>
                            </div>
                            <textarea class="js-maxlength form-control" name="alamat" maxlength="250" placeholder="Isikan alamat kampus..." data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" required>{{$data->alamat}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="map-canvasedit"></div>
                        
                    </div>
                    <div class="form-group">
                    <label for="">Latitude</label><br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-map-marker-alt"></i>
                                </span>
                            </div>
                            <input type="text" class="js-maxlength form-control" id="lat" value="{{$data->latitude}}" maxlength="30" name="latitude" placeholder="Latitude..." data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" required>
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="">Longitude</label><br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-location-arrow"></i>
                                </span>
                            </div>
                            <input type="text" class="js-maxlength form-control" id="lng" value="{{$data->longitude}}" maxlength="30" name="longitude" placeholder="Longitude..." data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" required>
                        </div>
                    </div>
                
<!-- Submit -->
                <div class="row items-push">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-12 col-xl-12 text-right">
                        <a href="{{route('admin.campus.index')}}" type="submit" class="btn bg-gray text-dark">Batal</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <!-- END Submit -->
            </form>
        </div>
    </div>
    <script>
            var map = new google.maps.Map(document.getElementById('map-canvasedit'), {
                center:{
                    lat: {{$data->latitude}},
                    lng: {{$data->longitude}}
                },
                zoom:15
            });

            var marker = new google.maps.Marker({
                position: {
                    lat: {{$data->latitude}},
                    lng: {{$data->longitude}}
                },
                map: map,
                draggable: true
            });

            var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));

            google.maps.event.addListener(searchBox,'places_changed', function(){
                var places = searchBox.getPlaces();
                var bounds = new google.maps.LatLngBounds();
                var i, place;

                for(i=0; place=places[i];i++){
                    bounds.extend(place.geometry.location);
                    marker.setPosition(place.geometry.location);


                } 
                map.fitBounds(bounds);
                map.setZoom(15);
            });

            google.maps.event.addListener(marker, 'position_changed', function(){
                var lat = marker.getPosition().lat();
                var lng = marker.getPosition().lng();

                $('#lat').val(lat);
                $('#lng').val(lng);


            });
        </script>

<!-- jQuery Validation -->
</div>
<!-- END Page Content -->
</div>
</main>
@endsection