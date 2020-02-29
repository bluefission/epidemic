@extends('app.master')

@section('content')

            <div id="google-map5" style="height: 400px; margin-bottom: 20px;" class="gmap"></div>

            <div class="content-wrap">
                <div class="container clearfix">

                    <p class="nobottommargin">Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus.Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Nulla vitae elit libero, a pharetra augue.</p>
                </div>
            </div>

@endsection

@section('scripts')
<!-- External JavaScripts
    ============================================= -->
    <script src="js/jquery.js"></script>
    <script src="js/plugins.js"></script>
    <script src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}"></script>
    <script src="js/jquery.gmap.js"></script>

    <!-- Footer Scripts
    ============================================= -->
    <script src="js/functions.js"></script>

    <script>

        $('#google-map5').gMap({
             address: 'North Carolina, USA',
             maptype: 'ROADMAP',
             zoom: 3,
             markers: [
                {
                    address: "Wilmington, NC",
                    html: "No Outbreak"
                },
                {
                    address: "California, USA",
                    html: "Community Transmission"
                },
                {
                    address: "Wuhan China",
                    html: "Vector Source"
                }
             ],
             doubleclickzoom: false,
             controls: {
                 panControl: true,
                 zoomControl: true,
                 mapTypeControl: false,
                 scaleControl: false,
                 streetViewControl: false,
                 overviewMapControl: false
            }
        });

        function findLocation( selector, getLatitude, getLongitude ) {
            jQuery(selector).gMap('clearMarkers').gMap('addMarker', {
                latitude: getLatitude,
                longitude: getLongitude,
                content: 'You have selected this Location.',
                popup: true
            }).gMap('centerAt', {
                latitude: getLatitude,
                longitude: getLongitude,
                zoom: 12
            });
        }

        jQuery(window).on( 'load',  function(){

            var t = setTimeout( function(){
                if(navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        jQuery('#google-map-outbreak').gMap('addMarker', {
                            latitude: position.coords.latitude,
                            longitude: position.coords.longitude,
                            content: 'You are here!',
                            popup: true
                        }).gMap('centerAt', {
                            latitude: position.coords.latitude,
                            longitude: position.coords.longitude,
                            zoom: 14
                        });
                    }, function() {
                        // alert('Couldn\'t find you :(');
                        console.log('no geocoding done');
                    });
                }
            }, 200 );

        });

        jQuery('#location-submit').click( function(e){

            var locationFinder = jQuery(this).parent().parent().find('#location-input').val();
            var locationFinderIcon = jQuery(this).parent().parent().find('.input-group-text').find('i');

            jQuery('#location-coordinates').fadeOut();

            if( locationFinder != '' ){
                locationFinderIcon.removeClass('icon-map-marker').addClass('icon-line-loader icon-spin');

                jQuery.ajax({
                    url: 'https://maps.google.com/maps/api/geocode/json?address=' + encodeURI(locationFinder),
                    //force to handle it as text
                    dataType: "text",
                    success: function(data) {
                        var json = jQuery.parseJSON(data);
                        findLocation( '#google-map-outbreak', json.results[0].geometry.location.lat, json.results[0].geometry.location.lng );
                        jQuery('#latitude-text').html('<strong>Latitude:</strong> ' + json.results[0].geometry.location.lat);
                        jQuery('#longitude-text').html('<strong>Longitude:</strong> ' + json.results[0].geometry.location.lng);
                        jQuery('#location-coordinates').fadeIn();
                        locationFinderIcon.removeClass('icon-line-loader icon-spin').addClass('icon-map-marker');
                    }
                });
            } else {
                alert('Please enter your Location!');
            }
            e.preventDefault();
        });

    </script>
@endsection