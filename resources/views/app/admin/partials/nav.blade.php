					<nav id="primary-menu">

						<ul>
							<li><a href="{{ route('admin.index') }}"><div>Dashboard</div></a></li>
							<li><a href="#"><div>Users</div></a></li>
							<li><a href="#"><div>Outbreaks</div></a></li>
							<li><a href="#"><div>Studies</div></a></li>
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

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						    {{ csrf_field() }}
						</form>

					</nav><!-- #primary-menu end -->
