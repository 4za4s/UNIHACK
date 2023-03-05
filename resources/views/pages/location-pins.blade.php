@extends('layouts.app')

@section('content')
<input id="pac-input" class="form-control" type="text" placeholder="Search Google MAP Address"/>
<div id="googleMap" style="width:100%;height:400px;"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header">{{ __('Add Pins') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ Form::open(array('route' => array('save-location-pins'), 'files' => true)) }}
                    <input type="hidden" name="id" value="{{ !is_null($pin)?$pin->id:'' }}">
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('lat', 'Latitude') }}
                                    {{ Form::text('lat', !is_null($pin)?$pin->lat:old('lat'), ["class" => "form-control", "id" => "lat"]) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('lng', 'Longitude') }}
                                    {{ Form::text('lng', !is_null($pin)?$pin->lat:old('lng'), ["class" => "form-control", "id" => "lng"]) }}
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('video', 'Video File') }}
                                    {{ Form::file('video', ["class" => "form-control"]) }}
                                </div>
                            </div> -->
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('business_title', 'Business Title') }}
                                    {{ Form::text('business_title', !is_null($pin)?$pin->business_title:old('business_title'), ["class" => "form-control"]) }}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('address', 'Display Address') }}
                                    {{ Form::text('address', !is_null($pin)?$pin->address:old('address'), ["class" => "form-control"]) }}
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('pin_type', 'Pin Type') }} <br>
                                    <label for="pin_type">
                                        <input type="radio" {{ (!is_null($pin)&&$pin->pin_type == "map-icon0.png")?"checked":"" }} name="pin_type" value="map-icon0.png" id="pin_type"><img src="{{ url('assets/img/map-icon0.png') }}" alt="">
                                    </label>
                                    <label for="pin_type1">
                                        <input type="radio" {{ (!is_null($pin)&&$pin->pin_type == "map-icon.png")?"checked":"" }} name="pin_type" value="map-icon.png" id="pin_type1"><img src="{{ url('assets/img/map-icon.png') }}" alt="">
                                    </label>
                                    <label for="pin_type2">
                                        <input type="radio" {{ (!is_null($pin)&&$pin->pin_type == "map-icon1.png")?"checked":"" }} name="pin_type" value="map-icon1.png" id="pin_type2"><img src="{{ url('assets/img/map-icon1.png') }}" alt="">
                                    </label>
                                    <label for="pin_type3">
                                        <input type="radio" {{ (!is_null($pin)&&$pin->pin_type == "map-icon2.png")?"checked":"" }} name="pin_type" value="map-icon2.png" id="pin_type3"><img src="{{ url('assets/img/map-icon2.png') }}" alt="">
                                    </label>
                                    <label for="pin_type4">
                                        <input type="radio" {{ (!is_null($pin)&&$pin->pin_type == "map-icon3.png")?"checked":"" }} name="pin_type" value="map-icon3.png" id="pin_type4"><img src="{{ url('assets/img/map-icon3.png') }}" alt="">
                                    </label>
                                    <label for="pin_type5">
                                        <input type="radio" {{ (!is_null($pin)&&$pin->pin_type == "map-icon4.png")?"checked":"" }} name="pin_type" value="map-icon4.png" id="pin_type5"><img src="{{ url('assets/img/map-icon4.png') }}" alt="">
                                    </label>
                                    <label for="pin_type6">
                                        <input type="radio" {{ (!is_null($pin)&&$pin->pin_type == "map-icon5.png")?"checked":"" }} name="pin_type" value="map-icon5.png" id="pin_type6"><img src="{{ url('assets/img/map-icon5.png') }}" alt="">
                                    </label>
                                    <label for="pin_type7">
                                        <input type="radio" {{ (!is_null($pin)&&$pin->pin_type == "map-icon6.png")?"checked":"" }} name="pin_type" value="map-icon6.png" id="pin_type7"><img src="{{ url('assets/img/map-icon6.png') }}" alt="">
                                    </label>
                                    <label for="pin_type8">
                                        <input type="radio" {{ (!is_null($pin)&&$pin->pin_type == "map-icon7.png")?"checked":"" }} name="pin_type" value="map-icon7.png" id="pin_type8"><img src="{{ url('assets/img/map-icon7.png') }}" alt="">
                                    </label>
                                    <label for="pin_type9">
                                        <input type="radio" {{ (!is_null($pin)&&$pin->pin_type == "map-icon8.png")?"checked":"" }} name="pin_type" value="map-icon8.png" id="pin_type9"><img src="{{ url('assets/img/map-icon8.png') }}" alt="">
                                    </label>
                                    <label for="pin_type10">
                                        <input type="radio" {{ (!is_null($pin)&&$pin->pin_type == "map-icon9.png")?"checked":"" }} name="pin_type" value="map-icon9.png" id="pin_type10"><img src="{{ url('assets/img/map-icon9.png') }}" alt="">
                                    </label>
                                    <label for="pin_type11">
                                        <input type="radio" {{ (!is_null($pin)&&$pin->pin_type == "map-icon10.png")?"checked":"" }} name="pin_type" value="map-icon10.png" id="pin_type11"><img src="{{ url('assets/img/map-icon10.png') }}" alt="">
                                    </label>
                                    <label for="pin_type12">
                                        <input type="radio" {{ (!is_null($pin)&&$pin->pin_type == "map-icon11.png")?"checked":"" }} name="pin_type" value="map-icon11.png" id="pin_type12"><img src="{{ url('assets/img/map-icon11.png') }}" alt="">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div id="images">
                                    <div class="form-group">
                                        {{ Form::label('image', 'Image') }} <br>
                                        <input type="file" name="images[]" id="image" class="form-control">
                                    </div>

                                </div>
                                <button type="button" id="add-image" class="btn btn-primary" style="float: right;">Add</button>
                            </div>
                            <div class="col-md-12">
                            @if(!is_null($pin))
                                    @foreach($pin->images as $ind => $image)
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <img src="{{ url('storage/'.$image) }}" alt="" width="150">
                                                <input type="hidden" name="old_images[]" value="{{ $image }}" id="image{{ $ind }}" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <label style="display:block;">&nbsp;</label>
                                                <button type="button" class="btn btn-danger remove-image" style="float: right;">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                            </div>
                        </div>


                        <div class="row mt-4">
                            <div class="col-md-12">
                                {{ Form::submit('Save Pin', ["class" => "btn btn-success"]) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">All Pins</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-stripped table-bordered">
                            <thead>
                                <tr>
                                    <th>Lat, Lng</th>
                                    <th>Business Title</th>
                                    <th>Address</th>
                                    <th>Pin Type</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($pins)
                                @foreach($pins as $pino)
                                <tr>
                                    <td>{{ $pino->lat }}, {{ $pino->lng }}</td>
                                    <td>{{ $pino->business_title }}</td>
                                    <td>{{ $pino->address }}</td>
                                    <td><img src="{{ url('assets/img/'.$pino->pin_type) }}" alt=""></td>
                                    <td>
                                        @foreach($pino->images as $image)
                                        <img src="{{ url('storage/'.$image) }}" alt="" width="150">
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('location-pins', ['id' => $pino->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="{{ route('delete-location-pin', ['id' => $pino->id]) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push("scripts")
<script src="{{ url('assets/vendors/jquery-3.5.1.min.js') }}"></script>

<script>
    var lat = '{{ !is_null($pin)?$pin->lat:"49.4521018" }}';
    var lng = '{{ !is_null($pin)?$pin->lng:"11.0766654" }}';
    function myMap() {
        var myCenter = new google.maps.LatLng(lat, lng);
        var mapProp = {
            center: myCenter,
            scrollwheel: true,
            zoom: 13,
            zoomControl: true,
            mapTypeControl: false,
            streetViewControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: [{
                "featureType": "landscape",
                "stylers": [{
                    "saturation": -100
                }, {
                    "lightness": 65
                }, {
                    "visibility": "on"
                }]
            }, {
                "featureType": "poi",
                "stylers": [{
                    "saturation": -100
                }, {
                    "lightness": 51
                }, {
                    "visibility": "simplified"
                }]
            }, {
                "featureType": "road.highway",
                "stylers": [{
                    "saturation": -100
                }, {
                    "visibility": "simplified"
                }]
            }, {
                "featureType": "road.arterial",
                "stylers": [{
                    "saturation": -100
                }, {
                    "lightness": 30
                }, {
                    "visibility": "on"
                }]
            }, {
                "featureType": "road.local",
                "stylers": [{
                    "color": "#fff"
                }, {
                    "visibility": "off"
                }]
            }, {
                "featureType": "transit",
                "stylers": [{
                    "saturation": -100
                }, {
                    "visibility": "simplified"
                }]
            }, {
                "featureType": "administrative.province",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "water",
                "elementType": "labels",
                "stylers": [{
                    "visibility": "on"
                }, {
                    "color": "#f7f7f7"
                }]
            }, {
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#f59b00"
                }, {
                    "visibility": "on"
                }]
            }]
        };
        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

                // Create the search box and link it to the UI element.
        const input = document.getElementById("pac-input");
        const searchBox = new google.maps.places.SearchBox(input);

        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        // Bias the SearchBox results towards current map's viewport.
        map.addListener("bounds_changed", () => {
            searchBox.setBounds(map.getBounds());
        });

        let markers = [];

        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener("places_changed", () => {
            const places = searchBox.getPlaces();

            if (places.length == 0) {
            return;
            }

            // // Clear out the old markers.
            markers.forEach((marker) => {
            marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            const bounds = new google.maps.LatLngBounds();

            places.forEach((place) => {
            if (!place.geometry || !place.geometry.location) {
                console.log("Returned place contains no geometry");
                return;
            }

            var myMarker = new google.maps.Marker({
                position: place.geometry.location,
                draggable: true
            });
            google.maps.event.addListener(myMarker, 'dragend', function(evt){

                $("#lat").val(evt.latLng.lat());
                $("#lng").val(evt.latLng.lng());
            });

            google.maps.event.addListener(map, 'click', function(event) {
                if (myMarker && myMarker.setMap) {
                    myMarker.setMap(null);
                    var myCenter = new google.maps.LatLng(event.latLng.lat(), event.latLng.lng());
                    myMarker.setPosition(myCenter);
                    // map.setCenter(myCenter);
                    myMarker.setMap(map);
                }

                $("#lat").val(event.latLng.lat());
                $("#lng").val(event.latLng.lng());
            });

            myMarker.setMap(map);
            $("#lat").val(place.geometry.location.lat());
            $("#lng").val(place.geometry.location.lng());
            // Create a marker for each place.
            markers.push(myMarker);

            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
            });
            map.fitBounds(bounds);
        });


        var myMarker = new google.maps.Marker({
            position: myCenter,
            draggable: true
        });
        myMarker.setMap(map);
        google.maps.event.addListener(myMarker, 'dragend', function(evt){

        $("#lat").val(evt.latLng.lat());
        $("#lng").val(evt.latLng.lng());
        });

        google.maps.event.addListener(map, 'click', function(event) {
        if (myMarker && myMarker.setMap) {
            myMarker.setMap(null);
            var myCenter = new google.maps.LatLng(event.latLng.lat(), event.latLng.lng());
            myMarker.setPosition(myCenter);
            // map.setCenter(myCenter);
            myMarker.setMap(map);
        }

        $("#lat").val(event.latLng.lat());
        $("#lng").val(event.latLng.lng());
        });
        markers.push(myMarker);

    }

    var index = 1;
    $("#add-image").click(function(){
        var html = `<div class="form-group">
                        <div class="row">
                            <div class="col-md-10">
                                {{ Form::label('image', 'Image') }} <br>
                                <input type="file" name="images[]" id="image`+index+`" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label style="display:block;">&nbsp;</label>
                                <button type="button" class="btn btn-danger remove-image" style="float: right;">Remove</button>
                            </div>
                        </div>
                    </div>`;
        $("#images").append(html);
        index++;
    });

    $(document).on("click", ".remove-image", function(){
        $(this).parent().parent().remove();
    });

</script>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;language=en&key=AIzaSyANJ03ykQk3sW_Osu4QRzuygNep9KiubH8&libraries=places&callback=myMap"></script>
@endpush
