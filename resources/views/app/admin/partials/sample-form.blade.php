

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="form-widget">

						<div class="form-result"></div>

						<div class="row shadow bg-light border">

							<div class="col-lg-4 dark" style="background: linear-gradient(rgba(0,0,0,.8), rgba(0,0,0,.2)), url('https://images.unsplash.com/photo-1511809870860-4d2806eb1908?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=668&q=80') center center / cover; min-height: 400px;">
								<h3 class="center mt-5">Fitness Quotes</h3>
								<div class="calories-wrap center w-100 px-2">
									<span class="uppercase mb-0 ls2">Loosing Fat</span>
									<h2 id="calories-count" class="calories display-3 mb-2 heading-block nobottomborder t600 font-body py-2"></h2>
									<span class="uppercase h6 ls3">Estimated Calories</span>
								</div>
								<small class="center m-0 position-absolute" style="bottom: 12px;">Metric Units</small>
							</div>

							<div class="col-lg-8 p-5">
								<form class="row mb-0" id="fitness-form" action="include/form.php" method="post" enctype="multipart/form-data">
									<div class="form-process"></div>
									<div class="col-12 form-group">
										<div class="row">
											<div class="col-sm-2 col-form-label">
												<label for="fitness-form-name">Name:</label>
											</div>
											<div class="col-sm-10">
												<input type="text" name="fitness-form-name" id="fitness-form-name" class="form-control required" value="" placeholder="Enter your Full Name">
											</div>
										</div>
									</div>
									<div class="col-12 form-group">
										<div class="row">
											<div class="col-sm-2 col-form-label">
												<label for="fitness-form-email">Email:</label>
											</div>
											<div class="col-sm-10">
												<input type="email" name="fitness-form-email" id="fitness-form-email" class="form-control required" value="" placeholder="Enter your Email">
											</div>
										</div>
									</div>
									<div class="col-12 form-group">
										<div class="row">
											<div class="col-sm-2 col-form-label">
												<label for="fitness-form-phone">Phone:</label>
											</div>
											<div class="col-sm-10">
												<input type="text" name="fitness-form-phone" id="fitness-form-phone" class="form-control required" value="" placeholder="Your Contact Number">
											</div>
										</div>
									</div>
									<div class="col-12 form-group">
										<div class="row">
											<div class="col-sm-2 col-form-label">
												<label for="fitness-form-phone">You Goals:</label>
											</div>
											<div class="col-sm-10">
												<div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
													<label class="btn btn-outline-dark font-body ls0 nott">
														<input type="radio" class="required form-control" name="fitness-form-goal" id="fitness-form-weight-loss" value="Weight Loss">Weight Loss
													</label>
													<label class="btn btn-outline-dark font-body ls0 nott">
														<input type="radio" class="required form-control" name="fitness-form-goal" id="fitness-form-mass-gain" value="Mass Gain">Mass Gain
													</label>
													<label class="btn btn-outline-dark font-body ls0 nott">
														<input type="radio" class="required form-control" name="fitness-form-goal" id="fitness-form-athletic-body" value="Athletic Body">Athletic Body
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="col-12 form-group">
										<div class="row">
											<div class="col-sm-2 col-form-label">
												<label for="fitness-form-sex">Gender:</label>
											</div>
											<div class="col-sm-6">
												<div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
													<label class="btn btn-outline-dark font-body ls0 nott">
														<input type="radio" class="required form-control" name="fitness-form-sex" id="fitness-form-male" value="Male">Male
													</label>
													<label class="btn btn-outline-dark font-body ls0 nott">
														<input type="radio" class="required form-control" name="fitness-form-sex" id="fitness-form-male" value="Female">Female
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="col-12 form-group">
										<div class="row">
											<div class="col-sm-2 col-form-label">
												<label for="fitness-form-age">Age:</label>
											</div>
											<div class="col-sm-5">
												<input type="number" min="10" max="50" name="fitness-form-age" id="fitness-form-age" class="form-control required" value="" placeholder="Enter your Age">
											</div>
										</div>
									</div>
									<div class="col-12 form-group">
										<div class="row">
											<div class="col-sm-2 col-form-label">
												<label for="fitness-form-weight">Weight:</label>
											</div>
											<div class="col-sm-5">
												<div class="input-group">
													<input type="number" max="140" name="fitness-form-weight" id="fitness-form-weight" class="form-control required" value="" placeholder="Enter your Weight">
													<div class="input-group-append">
														<span class="input-group-text bg-white">kgs</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-12 form-group">
										<div class="row">
											<div class="col-sm-2 col-form-label">
												<label for="fitness-form-height">Height:</label>
											</div>
											<div class="col-sm-5">
												<div class="input-group">
													<input type="number" maxlength="3" name="fitness-form-height" id="fitness-form-height" class="form-control required" value="" placeholder="Enter your height">
													<div class="input-group-append">
														<span class="input-group-text bg-white">cm</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-12 form-group mt-3">
										<div class="row">
											<div class="col-sm-2 col-form-label">
												<label for="fitness-form-activity">Day Acivity:</label>
											</div>
											<div class="col-sm-10">
												<input class="input-range-slider activity-range-slider required" name="fitness-form-activity" id="fitness-form-activity" />
											</div>
										</div>
									</div>
									<div class="col-12 hidden">
										<input type="text" id="fitness-form-botcheck" name="fitness-form-botcheck" value="" />
									</div>
									<div class="col-12 d-flex justify-content-end align-items-center">
										<button type="button" id="calories-trigger" class="btn btn-secondary">Calculate</button>
										<button type="submit" name="fitness-form-submit" class="btn btn-success ml-2">Submit Quote</button>
									</div>

									<input type="hidden" name="prefix" value="fitness-form-">
									<input type="hidden" name="subject" value="New Fitness Received">
									<input type="hidden" id="fitness-form-calories" name="fitness-form-calories" value="">
								</form>
							</div>

						</div>

					</div>

				</div>

			</div>
