@extends('app.layouts.master')

@section('content')
            <div class="content-wrap">

                <div class="container clearfix">

                    <div class="col_one_half nobottommargin">

                        <div class="well well-lg nobottommargin">
                            <form id="login-form" name="login-form" class="nobottommargin" action="{{ route('login') }}" method="post">
                                @csrf

                                <h1>{{ __('Login') }}</h1>

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
                                    <a href="#" class="button button-rounded si-facebook si-colored">Facebook</a>
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="fright">{{ __('Forgot Your Password?') }}</a>
                                    @endif

                                </div>

                            </form>
                        </div>

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