    // map script js
    var map;
    function makeInfoWindowEvent(map, infowindow, marker) {
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
        });
    }

    var myCenter = new google.maps.LatLng(lat, lng);

    function initialize() {
        var InforObj = [];
        var mapProp = {
            center: myCenter,
            scrollwheel: false,
            zoom: 10,
            zoomControl: true,
            mapTypeControl: false,
            streetViewControl: false,
            clickableIcons: false,
            mapTypeId: google.maps.MapTypeId.TERRAIN,
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

        map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        var mapMarkers = [];
        $.each(locationPins, function(e, item){
            var images = [];
            if(item.images.length){
                $.each(item.images, function(e, img){
                    images.push("<div class='swiper-slide'><img src='storage/"+img+"' alt='gallary' width='200'></div>");
                });
            }
            var slider = "";
            if(images.length){
             slider = `<div class="swiper infowindow-slider">
                        <div class="swiper-wrapper">
                        `+images.join("")+`
                        </div>
                    </div>`;
            }
            mapMarkers.push({
                "pin": "assets/img/"+item.pin_type,
                "lat": item.lat,
                "lng": item.lng,
                "title": item.address,
                "contentHTML": `<div class="info-box">
                    `+slider+`
                    <div class="box-content">
                        <h3>`+item.business_title+`</h3>
                        <p>`+item.address+`</p>
                    </div>
                </div>`
            });
        });
        
        if(mapMarkers.length > 0){
            mapMarkers.forEach(function(markerObj, i){
                var infowindow = new google.maps.InfoWindow({
                    content: markerObj.contentHTML
                });

                var icon = {
                    url: markerObj.pin, // url
                    scaledSize: new google.maps.Size(35, 35), // scaled size
                    origin: new google.maps.Point(0,0), // origin
                    anchor: new google.maps.Point(0, 0) // anchor
                };
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(markerObj.lat, markerObj.lng),
                    icon: icon,
                    title: markerObj.title,
                    //  animation: google.maps.Animation.BOUNCE,
                });

                marker.setMap(map);
                marker.addListener('click', function(e) {
                    closeOtherInfo();
                    infowindow.open(map, marker);
                    InforObj[0] = infowindow;
                    // map.panTo(this.getPosition());
                    map.setCenter(e.latLng);
                    animateMapZoomTo(map, 16);
                    // map.setZoom(16);

                    setTimeout(() => {
                        if($(".infowindow-slider").length){
                            var swiper = new Swiper(".infowindow-slider", {
                                slidesPerView:2,
                                spaceBetween: 0,
                                autoplay: {
                                    delay: 2000,
                                    disableOnInteraction: false,
                                },
                                mousewheel: true,
                            });
                        }
                    }, 500);
                });
            })

        }

        function closeOtherInfo() {
            if (InforObj.length > 0) {
                /* detach the info-window from the marker ... undocumented in the API docs */
                InforObj[0].set("marker", null);
                /* and close it */
                InforObj[0].close();
                /* blank the array */
                InforObj.length = 0;
            }
        }

        google.maps.event.addListener(map, "click", function(event) {
            closeOtherInfo();
            // map.setZoom(10);
            animateMapZoomTo(map, 10);
        });


    }
    // the smooth zoom function
    function animateMapZoomTo(map, targetZoom) {
        var currentZoom = arguments[2] || map.getZoom();
        if (currentZoom != targetZoom) {
            google.maps.event.addListenerOnce(map, 'zoom_changed', function (event) {
                animateMapZoomTo(map, targetZoom, currentZoom + (targetZoom > currentZoom ? 1 : -1));
            });
            setTimeout(function(){ map.setZoom(currentZoom) }, 60);
        }
    }
    // google.maps.event.addDomListener(window, 'load', initialize);
    $(initialize)