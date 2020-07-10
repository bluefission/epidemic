@extends('app.layouts.master')

@section('content')
			<div class="content-wrap">

				<div class="container clearfix">

					<div class="single-event">

						<div class="col_three_fourth">
							<h1>Outbreak</h1>

							<div class="entry-image nobottommargin">
								<!-- <a href="#"><img src="images/events/1.jpg" alt="Event Single"></a> -->
            					<div class="bottommargin divcenter" style="max-width: 750px; min-height: 350px;">
	                                <canvas id="chart-0"></canvas>
	                            </div>

								<div class="entry-overlay">
									<span class="d-none d-md-inline-block">Some Timer: </span><div id="event-countdown" class="countdown"></div>
								</div>
							</div>
						</div>
						<div class="col_one_fourth col_last">
							<div class="card events-meta mb-3">
								<div class="card-header"><h5 class="mb-0">Outbreak Info:</h5></div>
								<div class="card-body">
									<ul class="iconlist nobottommargin">
										<li><i class="icon-calendar3"></i>{{ $outbreak->zero_day }}</li>
										<li><i class="icon-time"></i> 20:00 - 02:00</li>
										<li><i class="icon-map-marker2"></i> {{ $outbreak->ground_zero }} </li>
										<li><i class="icon-euro"></i> <strong> {{$outbreak->infections }} Infected </strong></li>
									</ul>
								</div>
							</div>
							<a href="#" class="btn btn-success btn-block btn-lg">More Info</a>
						</div>


						<div class="clear"></div>

						<div class="col_three_fourth">
           					

							<h3>Details</h3>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae, voluptatum, amet, eius esse sit praesentium similique tenetur accusamus deserunt modi dignissimos debitis consequatur facere unde sint quasi quae architecto eum!</p>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, nesciunt, sapiente, distinctio obcaecati dolores perspiciatis eveniet adipisci repellendus consequatur ab officiis ipsa laudantium! Provident expedita odio iste corporis nam natus illum. Cupiditate, quis libero distinctio reiciendis quos adipisci eius animi.</p>

           					<div id="google-map-outbreak" style="height: 600px; margin-bottom: 20px;" class="gmap"></div>
							
							<h4>Symptoms</h4>

							<div class="col_half nobottommargin">

								<ul class="iconlist nobottommargin">
									<li><i class="icon-ok"></i> Fever</li>
									<li><i class="icon-ok"></i> Coughing</li>
									<li><i class="icon-ok"></i> Sneezing</li>
									<li><i class="icon-ok"></i> Nausea</li>
									<li><i class="icon-ok"></i> Dizziness</li>
								</ul>

							</div>

							<div class="col_half nobottommargin col_last">

								<ul class="iconlist nobottommargin">
									<li><i class="icon-ok"></i> Abdominal Pain</li>
									<li><i class="icon-ok"></i> Tiredness</li>
									<li><i class="icon-ok"></i> Fatigue</li>
									<li><i class="icon-ok"></i> Soreness</li>
									<li><i class="icon-ok"></i> Laryngitis</li>
								</ul>

							</div>


							<div>

								<h4>Events Timeline</h4>

								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Timings</th>
												<th>Location</th>
												<th>Events</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><span class="badge badge-danger">10:00 - 12:00</span></td>
												<td>Main Auditorium</td>
												<td>WWDC Developer Conference</td>
											</tr>
											<tr>
												<td><span class="badge badge-danger">12:00 - 12:45</span></td>
												<td>Cafeteria</td>
												<td>Lunch</td>
											</tr>
											<tr>
												<td><span class="badge badge-danger">13:00 - 14:00</span></td>
												<td>Audio-Visual Lab</td>
												<td>Apple Engineers Brain-Storming &amp; Questionaire</td>
											</tr>
											<tr>
												<td><span class="badge badge-danger">15:00 - 18:00</span></td>
												<td>Room - 25, 2nd Floor</td>
												<td>Hardware Testing &amp; Evaluation</td>
											</tr>
										</tbody>
									</table>
								</div>

							</div>

						</div>

						<div class="clear"></div>

					</div>

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
    </script>
@endsection