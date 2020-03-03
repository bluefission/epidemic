@extends('app.layouts.master')

@section('content')
            <div class="content-wrap">

                <div class="container clearfix">

                    <div class="col_half nobottommargin">

                        <h1>{{ __('Register') }}</h1>

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

                                <a href="#" class="button button-rounded si-facebook si-colored">Facebook</a>
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