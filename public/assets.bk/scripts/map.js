    // map script js
    var map;
    function makeInfoWindowEvent(map, infowindow, marker) {
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
        });
    }

    var myCenter = new google.maps.LatLng(lat, lng);

    function initialize() {
        var mapZoom = 13;
        var InforObj = [];
        var mapProp = {
            center: myCenter,
            scrollwheel: false,
            zoom: mapZoom,
            mapId: "154d191cf38ce80c",
            zoomControl: true,
            mapTypeControl: false,
            streetViewControl: false,
            clickableIcons: false,
            styles: [
                { featureType: "all", elementType: "labels.text.fill", stylers: [{ saturation: 36 }, { color: "#000000" }, { lightness: 40 }] },
                { featureType: "all", elementType: "labels.text.stroke", stylers: [{ visibility: "off" }, { color: "#000000" }, { lightness: 16 }] },
                { featureType: "all", elementType: "labels.icon", stylers: [{ visibility: "off" }] },
                { featureType: "administrative", elementType: "geometry.fill", stylers: [{ color: "#000000" }, { lightness: 20 }] },
                { featureType: "administrative", elementType: "geometry.stroke", stylers: [{ color: "#000000" }, { lightness: 17 }, { weight: 1.2 }] },
                { featureType: "landscape", elementType: "geometry", stylers: [{ color: "#000000" }, { lightness: 20 }] },
                { featureType: "poi", elementType: "geometry", stylers: [{ color: "#000000" }, { lightness: 21 }] },
                { featureType: "road.highway", elementType: "geometry.fill", stylers: [{ color: "#000000" }, { lightness: 17 }] },
                { featureType: "road.highway", elementType: "geometry.stroke", stylers: [{ color: "#000000" }, { lightness: 29 }, { weight: 0.2 }] },
                { featureType: "road.arterial", elementType: "geometry", stylers: [{ color: "#000000" }, { lightness: 18 }] },
                { featureType: "road.local", elementType: "geometry", stylers: [{ color: "#000000" }, { lightness: 16 }] },
                { featureType: "transit", elementType: "geometry", stylers: [{ color: "#000000" }, { lightness: 19 }] },
                { featureType: "water", elementType: "geometry", stylers: [{ color: "#000000" }, { lightness: 17 }] },
            ],
        };

        map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

        var mapMarkers = [];
        $.each(locationPins, function(e, item){
            var images = [];
            if(item.images.length){
                $.each(item.images, function(e, img){
                    images.push("<div class='swiper-slide'><img src='storage/"+img+"' alt='gallary' width='200' data-fancybox='gallery-1'></div>");
                });
            }
            var slider = "";
            if(images.length){
             slider = `<div class="swiper infowindow-slider">
                        <div class="swiper-wrapper">
                        `+images.join("")+`
                        </div>
                        <div class="swiper-pagination"></div>
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
                        <button style="border: 1px solid #ddd;padding: 10px;margin-top: 10px;">Apply Now</button>
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
                    scaledSize: new google.maps.Size(30, 30), // scaled size
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
                                slidesPerView:1,
                                spaceBetween: 0,
                                pagination: {
                                    el: '.swiper-pagination',
                                  },
                                autoplay: {
                                    delay: 6000,
                                    disableOnInteraction: false,
                                },
                                mousewheel: true,
                            });
                            // Fancybox.bind("[data-fancybox-map]", {
                            //     // Your options go here
                            //   });
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
            animateMapZoomTo(map, 12);
        });
        featureLayer = map.getFeatureLayer("LOCALITY");
        // Define a style with purple fill and border.
        //@ts-ignore
        const featureStyleOptions = {
            strokeColor: "#5DE1E6",
            strokeOpacity: 1.0,
            strokeWeight: 3.0,
            fillColor: "#5DE1E6",
            fillOpacity: 0.3,
        };

        // Apply the style to a single boundary.
        //@ts-ignore
        featureLayer.style = (options) => {
            // if (options.feature.placeId == "ChIJ0xy2ta5Xn0cRtyGMqYWvXd0") {
            if (options.feature.placeId == "ChIJgf0RD69C1moR4OeMIXVWBAU") {
            // Hana, HI
            return featureStyleOptions;
            }
        };


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
    google.maps.event.addDomListener(window, 'load', initialize);
