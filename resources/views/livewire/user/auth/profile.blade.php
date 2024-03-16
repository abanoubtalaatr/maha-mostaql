@extends('layouts.user')
@section('content')

    <div >
        <section class="head_banner">
            <div class="layer">
                &nbsp;
            </div>

        </section>
        <section class="profile">
            <div class="container">
                <div class="row">
                    <div class="col-12 position-relative">
                        <div class="col-12 position-relative">
                            <div class="circle">
                                <img id="image-preview" style="max-width: 100%;" src="{{ isset($photo) ? $photo->temporaryUrl() : (auth()->user()->avatar ? asset('uploads/' . auth()->user()->avatar) : asset('website/assets/images/public/prof.png')) }}" alt="">
                            </div>
                            <div class="p-image">
                                <img class="upload-button" src="{{ asset('website/assets/images/public/ed-pen.svg') }}">
                                <input type="file" id="photo" class="file-upload" accept="image/png">
                            </div>
                        </div>

                    </div>
                    <div class="col-12">
                        @isset($message)
                            <span class="alert alert-info">{{$message}}</span>
                        @endif
                            <form class="sign_box row sign_box_prof" method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <input type="hidden" id="image-data" name="image_data">

                                <div class=" mb-3  col-md-6">
                                <label class="form-label" for="user">@lang('site.full_name')</label>

                                <div class="input-group border rounded">
                                    <span class="input-group-text bg-transparent border-0"><img src="{{asset('website/assets/images/auth/user.svg')}}" alt=""></span>
                                    <input   type="text" class="form-control bg-transparent border-0" name="username" id="user" value="{{auth()->user()->username}}">
                                </div>
                                @error('username')<p style='color:red'> {{$message}} </p>@enderror

                            </div>
                            <div class="mb-3  col-md-6">
                                <label class="form-label" for="mail"> @lang('site.email')</label>

                                <div class="input-group  border rounded">
                                    <span class="input-group-text bg-transparent border-0"><img src="{{asset('website/assets/images/auth/msg.svg')}}" alt=""></span>
                                    <input type="email"  class="form-control bg-transparent border-0" name="email" id="mail" value="{{auth()->user()->email}}">
                                </div>
                                @error('email')<p style='color:red'> {{$message}} </p>@enderror

                            </div>
                            <div class="mb-3  col-md-6">
                                <label class="form-label" for="add">@lang('site.address')</label>

                                <div class="input-group  border rounded">
                                    <input id="search-input" class="form-control mb-3 bg-transparent border-0 pac-target-input"  type="text" placeholder="Search for places">

                                </div>
                                <div id="map"></div>
                            </div>
                            <div class=" mb-3  col-md-6">
                                <label class="form-label" for="user">@lang('site.phone_number')</label>

                                <div class="input-group border rounded">
                                    <input  type="text" class="form-control bg-transparent border-0" id="user" name="mobile" value="{{auth()->user()->mobile}}" >
                                    <span class="input-group-text bg-transparent border-0">+966 </span>

                                </div>
                                @error('mobile')<p style='color:red'> {{$message}} </p>@enderror

                            </div>
                                <input hidden name="latitude" >
                                <input hidden name="longitude" >
                            <div class="mb-4 col-md-3">
                                <button type="submit"  class="btn btn-1 px-5 ">@lang('site.edit')</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
<script src="{{ asset('website/assets/js/jquery.js') }}"></script>
<script>
    var marker; // Declare marker variable outside the function
    window.addEventListener('load', function () {
        initMap();
        initImagePreview();

    });
    function initImagePreview() {
        // Get the file input element
        var input = document.getElementById('photo');

        // Add event listener for file input change
        input.addEventListener('change', function () {
            var file = input.files[0];
            var reader = new FileReader();

            // When file is loaded, update image source
            reader.onload = function (e) {
                document.getElementById('image-preview').src = e.target.result;
                document.getElementById('image-data').value = e.target.result;

            };

            // Read file as data URL
            reader.readAsDataURL(file);
        });
    }
    var marker; // Declare marker variable outside the function

    function initMap() {
        var defaultLatitude = parseFloat("{{ auth()->user()->latitude }}");
        var defaultLongitude = parseFloat("{{ auth()->user()->longitude }}");

        var map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: defaultLatitude, lng: defaultLongitude },
            zoom: 8
        });
         marker = new google.maps.Marker({
            position: { lat: defaultLatitude, lng: defaultLongitude },
            map: map,
            title: 'Default Location'
        });

        var input = document.getElementById('search-input');
        var searchBox = new google.maps.places.SearchBox(input);

        var marker; // Declare marker variable outside the functions

        map.addListener('bounds_changed', function () {
            searchBox.setBounds(map.getBounds());
        });

        searchBox.addListener('places_changed', function () {
            var places = searchBox.getPlaces();

            if (places.length === 0) {
                return;
            }

            var bounds = new google.maps.LatLngBounds();
            places.forEach(function (place) {
                if (!place.geometry || !place.geometry.location) {
                    console.log('Returned place contains no geometry');
                    return;
                }

                // Clear existing marker (if any)
                if (marker) {
                    marker.setMap(null);
                }

                marker = new google.maps.Marker({
                    position: place.geometry.location,
                    map: map,
                    title: place.name
                });

                bounds.extend(place.geometry.location);
            });

            map.fitBounds(bounds);

            var selectedPlace = places[0];
            // Update hidden inputs with latitude and longitude values
            document.getElementsByName('latitude')[0].value = selectedPlace.geometry.location.lat();
            document.getElementsByName('longitude')[0].value = selectedPlace.geometry.location.lng();
        });

        // Add click event listener on the map
        map.addListener('click', function (event) {
            // Clear existing marker (if any)
            if (marker) {
                marker.setMap(null);
            }

            // Add a new marker at the clicked location
            marker = new google.maps.Marker({
                position: event.latLng,
                map: map,
                title: 'Clicked Location'
            });

            // Update hidden inputs with latitude and longitude values
            document.getElementsByName('latitude')[0].value = event.latLng.lat();
            document.getElementsByName('longitude')[0].value = event.latLng.lng();
        });
    }


</script>



<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTYfF-dNzmHzNxFDDK-AvqiZ7DIXvN6ZU&libraries=places&callback=initMap" async defer></script>
