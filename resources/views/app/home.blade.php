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
                                <div style="text-align: center;"><a href="#">Terms of Use</a> | <a href="#">Privacy Policy</a></div>
                                <div class="clear"></div>
                                <div class="col_full">
                                    <a href="#" class="button button-3d button-teal button-xlarge nobottommargin"><i class="icon-star3"></i>Sign Up Now</a>
                                </div>
                            </form>

                            <p>
                                <h3>The Need for Crowd Sourced Epidemiology</h3>

                                <iframe width="560" height="315" src="https://www.youtube.com/embed/6Af6b_wyiwI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </p>
                        </div>
                        <div class="col_two_third col_last">
                            <p>With legitimate concerns regarding whether or not we are <a href="https://www.theatlantic.com/magazine/archive/2018/07/when-the-next-plague-hits/561734/" target="_blank">ready for the next pandemic</a> it is important to invest in technologies and practices to protect us from the threat of contagious existential threats. Due to inconsistencies from the <a href="https://www.cnbc.com/2020/02/15/heres-why-the-white-house-doesnt-trust-chinas-coronavirus-numbers.html" target="_blank">early reporting</a> and <a href="https://www.nytimes.com/2020/02/12/world/asia/china-coronavirus-cases.html" target="_blank">tracking styles</a> for the Covid-19 virus from China and <a href="http://www.cidrap.umn.edu/news-perspective/2020/02/cdc-warns-us-covid-19-spread-labs-frustrated-over-lack-tests" target="_blank">small initial sample sizes</a> and <a href="https://www.livescience.com/covid-19-coronovirus-test.html" target="_blank">unpreperation</a> in the United States, trust worthy input regarding the disease's spread was hard to discern. </p>
 
                            <p>This is a framework for a platform to help track epidemic movement based on analyzing generalized data. The idea of to create a heat map of symptoms and confirmations so you can have coordinated and organized quarantine and health service. This is largely to help provide real time transpancy for the public and for experts needing consistent user-submitted data. This allows us to collect, share, and spread information in a sensible, rather than sensational fashion. The collection and analysis of data allows us to make strides in telemedicine, predictive germ simulation, and diagnosis.</p>

                            <div class="bottommargin divcenter" style="max-width: 750px; min-height: 350px;">
                                <canvas id="chart-0"></canvas>
                            </div>

                            <p></p>

                            <div class="bottommargin">

                            </div>
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

<!-- Charts JS
    ============================================= -->
    <script src="js/chart.js"></script>
    <script src="js/chart-utils.js"></script>

    <script>

        var lineChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: "My First dataset",
                borderColor: window.chartColors.red,
                backgroundColor: window.chartColors.red,
                fill: false,
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor()
                ],
                yAxisID: "y-axis-1",
            }, {
                label: "My Second dataset",
                borderColor: window.chartColors.blue,
                backgroundColor: window.chartColors.blue,
                fill: false,
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor()
                ],
                yAxisID: "y-axis-2"
            }]
        };

        window.onload = function() {
            var ctx = document.getElementById("chart-0").getContext("2d");
            window.myLine = Chart.Line(ctx, {
                data: lineChartData,
                options: {
                    responsive: true,
                    hoverMode: 'index',
                    stacked: false,
                    title:{
                        display: true,
                        text:'Line Chart - Multi Axis'
                    },
                    scales: {
                        yAxes: [{
                            type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                            display: true,
                            position: "left",
                            id: "y-axis-1",
                        }, {
                            type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                            display: true,
                            position: "right",
                            id: "y-axis-2",

                            // grid line settings
                            gridLines: {
                                drawOnChartArea: false, // only want the grid lines for one axis to show up
                            },
                        }],
                    }
                }
            });
        };

        /*
        document.getElementById('randomizeData').addEventListener('click', function() {
            lineChartData.datasets.forEach(function(dataset) {
                dataset.data = dataset.data.map(function() {
                    return randomScalingFactor();
                });
            });

            window.myLine.update();
        });
        */

    </script>


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