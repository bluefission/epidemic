@extends('app.layouts.master')

@section('content')
			<div class="content-wrap">

				<div class="container clearfix">

					<div class="single-event">

						<div class="col_three_fourth">
							<div class="entry-image nobottommargin">
								<a href="#"><img src="images/events/1.jpg" alt="Event Single"></a>
								<div class="entry-overlay">
									<span class="d-none d-md-inline-block">Starts in: </span><div id="event-countdown" class="countdown"></div>
								</div>
							</div>
						</div>
						<div class="col_one_fourth col_last">
							<div class="card events-meta mb-3">
								<div class="card-header"><h5 class="mb-0">Event Info:</h5></div>
								<div class="card-body">
									<ul class="iconlist nobottommargin">
										<li><i class="icon-calendar3"></i> 31st March, 2015</li>
										<li><i class="icon-time"></i> 20:00 - 02:00</li>
										<li><i class="icon-map-marker2"></i> Ibiza, Spain</li>
										<li><i class="icon-euro"></i> <strong>99.99</strong></li>
									</ul>
								</div>
							</div>
							<a href="#" class="btn btn-success btn-block btn-lg">Buy Tickets</a>
						</div>

						<div class="clear"></div>

						<div class="col_three_fourth">

							<h3>Details</h3>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae, voluptatum, amet, eius esse sit praesentium similique tenetur accusamus deserunt modi dignissimos debitis consequatur facere unde sint quasi quae architecto eum!</p>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, nesciunt, sapiente, distinctio obcaecati dolores perspiciatis eveniet adipisci repellendus consequatur ab officiis ipsa laudantium! Provident expedita odio iste corporis nam natus illum. Cupiditate, quis libero distinctio reiciendis quos adipisci eius animi.</p>

							<h4>Inclusions</h4>

							<div class="col_half nobottommargin">

								<ul class="iconlist nobottommargin">
									<li><i class="icon-ok"></i> Return Flight Tickets</li>
									<li><i class="icon-ok"></i> All Local/Airport Transfers</li>
									<li><i class="icon-ok"></i> Resort Accomodation</li>
									<li><i class="icon-ok"></i> All Meals Included</li>
									<li><i class="icon-ok"></i> Adventure Activities</li>
								</ul>

							</div>

							<div class="col_half nobottommargin col_last">

								<ul class="iconlist nobottommargin">
									<li><i class="icon-ok"></i> Erotic Games</li>
									<li><i class="icon-ok"></i> Local Guides</li>
									<li><i class="icon-ok"></i> Support Staff</li>
									<li><i class="icon-ok"></i> Personal Security</li>
									<li><i class="icon-ok"></i> VISA Fees &amp; Medical Insurance</li>
								</ul>

							</div>

						</div>

						<div class="col_one_fourth col_last">

							<h4>Location</h4>

							<section id="event-location" class="gmap" style="height: 300px;"></section>


						</div>

						<div class="clear"></div>

						<div class="col_two_fifth nobottommargin">

							<h4>Gallery</h4>

							<!-- Events Single Gallery Thumbs
							============================================= -->
							<div class="masonry-thumbs grid-4" data-lightbox="gallery">
								<a href="images/events/1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/events/thumbs/1.jpg" alt="Gallery Thumb 1"></a>
								<a href="images/events/2.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/events/thumbs/2.jpg" alt="Gallery Thumb 2"></a>
								<a href="images/events/3.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/events/thumbs/3.jpg" alt="Gallery Thumb 3"></a>
								<a href="images/events/4.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/events/thumbs/4.jpg" alt="Gallery Thumb 4"></a>
								<a href="images/events/5.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/events/thumbs/5.jpg" alt="Gallery Thumb 5"></a>
								<a href="images/events/6.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/events/thumbs/6.jpg" alt="Gallery Thumb 6"></a>
								<a href="images/events/7.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/events/thumbs/7.jpg" alt="Gallery Thumb 7"></a>
								<a href="images/events/8.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/events/thumbs/8.jpg" alt="Gallery Thumb 8"></a>
							</div><!-- Event Single Gallery Thumbs End -->

						</div>

						<div class="col_three_fifth nobottommargin col_last">

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

				</div>

			</div>
@endsection