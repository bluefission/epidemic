@extends('app.master')

@section('content')

            <div id="google-map-outbreak" style="height: 400px; margin-bottom: 20px;display:none;" class="gmap"></div>

            <div class="content-wrap">
                <div class="container clearfix">

                    <div class="onboarding" id="onboarding-step-1">
                        <img src="https://github.com/bluefission/epidemic/raw/master/resources/views/onboard-step-1-mockup.png" />
                    </div>
                    <div class="onboarding" id="onboarding-step-2">
                        <img src="https://github.com/bluefission/epidemic/raw/master/resources/views/onboard-step-2-mockup.png" />
                    </div>
                    <div class="onboarding" id="onboarding-step-3">
                        <img src="https://github.com/bluefission/epidemic/raw/master/resources/views/onboard-step-3-mockup.png" />
                    </div>
                    <div class="onboarding" id="onboarding-step-4">
                        <img src="https://github.com/bluefission/epidemic/raw/master/resources/views/invite-mockup.png" />
                    </div>
                    <div class="onboarding" id="onboarding-step-5">
                        <img src="https://github.com/bluefission/epidemic/raw/master/resources/views/main-survey-mockup.png" />
                    </div>
                    <div class="onboarding" id="onboarding-step-6">
                        <img src="https://github.com/bluefission/epidemic/raw/master/resources/views/results-mockup.png" />
                    </div>
                    <div class="onboarding" id="onboarding-step-7">
                        <img src="https://github.com/bluefission/epidemic/raw/master/resources/views/main-dashboard-mockup.png  " />
                    </div>
                    <div class="onboarding" id="onboarding-step-8">
                        <img src="https://github.com/bluefission/epidemic/raw/master/resources/views/deep-dive-mockup.png" />
                    </div>

                    <div id="section-home" class="recent-info heading-block title-center nobottomborder page-section">
                        <h1>Track and Predict Contagious Outbreaks</h1>
                        <span>Join the <span class="color">largest</span> public epidemic tracking community online</span>
                    </div>

                    <div class="center bottommargin recent-info">
                        <div class="col_one_third">

                            <form>
                                <div class="col_full">
                                    <label for="template-contactform-subject">Email Address <small>*</small></label>
                                    <input type="text" id="template-contactform-subject" name="subject" value="" class="required sm-form-control valid">
                                </div>
                                <div class="clear"></div>

                                <div class="col_full">
                                    <label for="template-contactform-subject">Password <small>*</small></label>
                                    <input type="password" id="template-contactform-subject" name="subject" value="" class="required sm-form-control valid">
                                </div>
                                <div class="clear"></div>
                                <div class="col_full">
                                    <a href="#" class="button button-3d button-teal button-xlarge nobottommargin"><i class="icon-star3"></i>Sign Up Now</a>
                                </div>
                            </form>
                        </div>
                        <div class="col_two_third col_last">
                            <p class="nobottommargin">
                            Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus.Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Nulla vitae elit libero, a pharetra augue.</p>
                        </div>
                    </div>
                    
                    <div class="clear"></div>
                </div>
            </div>

@endsection

@section('scripts')
<!-- External JavaScripts
    ============================================= -->
    <style>
        .onboarding {
            text-align: center;
        }
        .recent-info {
            display: none;
        }
    </style>
    <script src="js/jquery.js"></script>
    <script src="js/plugins.js"></script>
    <script src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}"></script>
    <script src="js/jquery.gmap.js"></script>

    <!-- Footer Scripts
    ============================================= -->
    <script src="js/functions.js"></script>

    <script>

        $(document).ready(function() {
            $('.onboarding').hide();
            $('.onboarding:first').fadeIn();
            $('.onboarding').on('click', function(e) {
                $(this).fadeOut(function() {
                    var $next = $(this).next('.onboarding');
                    if ( $next.length > 0 ) {
                        $next.fadeIn();
                    } else {
                        $('#google-map-outbreak').fadeIn(function() {
                            $('.recent-info').fadeIn();
                        });
                    }
                });
            });
        });

        $('#google-map-outbreak').gMap({
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