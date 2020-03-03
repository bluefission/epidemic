@extends('app.layouts.master')

@section('hero')
		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Page Not Found</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Pages</a></li>
					<li class="breadcrumb-item active" aria-current="page">404</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

@endsection

@section('content')
		<!-- Content
		============================================= -->

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="col_half nobottommargin">
						<div class="error404 center">404</div>
					</div>

					<div class="col_half nobottommargin col_last">

						<div class="heading-block nobottomborder">
							<h4>Ooopps.! The Page you were looking for, couldn't be found.</h4>
							<span>Try searching for the best match or browse the links below:</span>
						</div>

						<form action="#" method="get" class="nobottommargin">
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Search for Pages...">
								<div class="input-group-append">
									<button class="btn btn-danger" type="button">Search</button>
								</div>
							</div>
						</form>

						<div class="col_one_third widget_links topmargin nobottommargin">
							<ul>
								<li><a href="#">Home</a></li>
								<li><a href="#">About</a></li>
								<li><a href="#">FAQs</a></li>
							</ul>
						</div>

						<div class="col_one_third widget_links topmargin nobottommargin">
							<ul>
								<li><a href="#">Shop</a></li>
								<li><a href="#">Portfolio</a></li>
								<li><a href="#">Blog</a></li>
							</ul>
						</div>

						<div class="col_one_third widget_links topmargin nobottommargin col_last">
							<ul>
								<li><a href="#">Support</a></li>
								<li><a href="#">Forums</a></li>
								<li><a href="#">Contact</a></li>
							</ul>
						</div>

					</div>

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

    <!-- Footer Scripts
    ============================================= -->
    <script src="js/functions.js"></script>
@endsection