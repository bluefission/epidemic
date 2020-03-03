@extends('app.layouts.master')

@section('content')
			<div class="content-wrap">

				<div class="container clearfix">

					<div class="col_one_third nobottommargin">

						<div class="well well-lg nobottommargin">
							<form id="login-form" name="login-form" class="nobottommargin" action="{{ route('login') }}" method="post">
		                        @csrf

								<h3>{{ __('Login') }}</h3>

								<div class="col_full">
									<label for="login-form-username">{{ __('E-Mail Address') }}:</label>
									<input type="email" id="login-form-username" name="email" value="" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" />

	                                @error('email')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>

								<div class="col_full">
									<label for="login-form-password">{{ __('Password') }}:</label>
									<input type="password" id="login-form-password" name="password" value="" class="form-control @error('password') is-invalid @enderror" autocomplete="current-password" />

									@error('password')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>

								<div class="col_full">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
		                        </div>

								<div class="col_full nobottommargin">
									<button class="button button-3d nomargin" id="login-form-submit" name="login-form-submit" value="login">{{ __('Login') }}</button>
                                	@if (Route::has('password.request'))
									<a href="{{ route('password.request') }}" class="fright">{{ __('Forgot Your Password?') }}</a>
                                	@endif

								</div>

							</form>
						</div>

					</div>

					<div class="col_two_third col_last nobottommargin">

						<h3>{{ __('Register') }}</h3>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, vel odio non dicta provident sint ex autem mollitia dolorem illum repellat ipsum aliquid illo similique sapiente fugiat minus ratione.</p>

						<form id="register-form" name="register-form" class="nobottommargin" action="{{ route('register') }}" method="post">

							<div class="col_half">
								<label for="register-form-name">{{ __('Name') }}:</label>
								<input type="text" id="register-form-name" name="name" value="" class="form-control" />
								@error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>

							<div class="col_half col_last">
								<label for="register-form-email">{{ __('E-Mail Address') }}:</label>
								<input type="text" id="register-form-email" name="email" value="" class="form-control" />
								@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>

							<div class="clear"></div>
							<?php
							/*

							<div class="col_half">
								<label for="register-form-username">Choose a Username:</label>
								<input type="text" id="register-form-username" name="register-form-username" value="" class="form-control" />
							</div>

							<div class="col_half col_last">
								<label for="register-form-phone">Phone:</label>
								<input type="text" id="register-form-phone" name="register-form-phone" value="" class="form-control" />
							</div>

							<div class="clear"></div>
							*/
							?>
							<div class="col_half">
								<label for="register-form-password">{{ __('Password') }}:</label>
								<input type="password" id="register-form-password" name="password" value="" class="form-control" autocomplete="new-password" />

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>

							<div class="col_half col_last">
								<label for="register-form-repassword">{{ __('Confirm Password') }}:</label>
								<input type="password" id="password-confirm" name="register-form-repassword" value="" class="form-control" />
							</div>

							<div class="clear"></div>

							<div class="col_full nobottommargin">
								<button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register">{{ __('Register') }}</button>
							</div>

						</form>

					</div>

				</div>

			</div>
@endsection

@section('scripts')
	<script src="js/jquery.js"></script>
    <script src="js/plugins.js"></script>

    <!-- Footer Scripts
    ============================================= -->
    <script src="js/functions.js"></script>
@endsection