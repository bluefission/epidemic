					<nav id="primary-menu">

						<ul>
							<li><a href="/"><div>Home</div></a></li>
							<li class="mega-menu"><a href="#"><div>Outbreaks</div></a>
								<div class="mega-menu-content style-2 clearfix">
									<ul class="mega-menu-column col-lg-3">
										<li class="mega-menu-title"><a href="#"><div>Pathogens</div></a>
											<ul>
												<li><a href="#"><div>Covid-19</div></a></li>
												<li><a href="#"><div>Common Cold</div></a></li>
												<li><a href="#"><div>Flu</div></a></li>
											</ul>
										</li>
									</ul>
									<ul class="mega-menu-column col-lg-3">
										<li class="mega-menu-title"><a href="#"><div>Conditions</div></a>
											<ul>
												<li><a href="#"><div>Diabetes</div></a></li>
												<li><a href="#"><div>Obesity</div></a></li>
											</ul>
										</li>
									</ul>
									<ul class="mega-menu-column col-lg-3">
										<li class="mega-menu-title"><a href="#"><div>Food Borne</div></a>
											<ul>
												<li><a href="#"><div>Salad Salmonella</div></a></li>
											</ul>
										</li>
									</ul>
									<ul class="mega-menu-column col-lg-3">
										<li class="mega-menu-title"><a href="#"><div>Other</div></a>
											<ul>
												<li><a href="#"><div>Lorem</div></a></li>
												<li><a href="#"><div>Ipsum</div></a></li>
											</ul>
										</li>
									</ul>
								</div>
							</li>
							<li><a href="#"><div>Download App</div></a></li>
							<li><a href="#"><div>Updates</div></a></li>
							<li><a href="https://github.com/bluefission/epidemic"><div>Contribute</div></a></li>
							@if (Route::has('login'))
			                    @auth
			                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									    Logout
									</a></li>
			                    @else
			                        <li><a href="{{ route('login') }}"><div>Login</div></a></li>
			                        @if (Route::has('register'))
			                            <li class="current"><a href="{{ route('register') }}"><div>Sign Up</div></a></li>
			                        @endif
			                    @endauth
				            @endif
								
						</ul>

						<!-- Top Search
						============================================= -->
						<div id="top-search">
							<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
							<form action="search.html" method="get">
								<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
							</form>
						</div><!-- #top-search end -->
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						    {{ csrf_field() }}
						</form>

					</nav><!-- #primary-menu end -->
