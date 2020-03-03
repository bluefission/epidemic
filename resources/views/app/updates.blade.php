@extends('app.layouts.master')

@section('content')
			<div class="content-wrap">

				<a href="#" class="button button-full button-purple center tright header-stick bottommargin-lg">
					<div class="container clearfix">
						Breaking Information. <strong>Check Out</strong> <i class="icon-caret-right" style="top:4px;"></i>
					</div>
				</a>

				<div class="container clearfix">

					<div class="heading-block center">
						<h1>Recent Updates</h1>
						<span>We almost blog regularly about this &amp; that.</span>
					</div>

					<!-- Post Content
					============================================= -->
					<div class="postcontent nobottommargin clearfix">

						<!-- Posts
						============================================= -->
						<div id="posts" class="small-thumbs">

							@include('app.partials.update-listing')

						</div><!-- #posts end -->

						<!-- Pagination
						============================================= -->
						<div class="row mb-3">
							<div class="col-12">
								<a href="#" class="btn btn-outline-secondary float-left">&larr; Older</a>
								<a href="#" class="btn btn-outline-dark float-right">Newer &rarr;</a>
							</div>
						</div>
						<!-- .pager end -->

					</div><!-- .postcontent end -->

					<!-- Sidebar
					============================================= -->
					<div class="sidebar nobottommargin col_last clearfix">
						@include('app.partials.updates-sidebar')
					</div><!-- .sidebar end -->

				</div>

			</div>

@endsection

@section('scripts')
	<!-- External JavaScripts
    ============================================= -->
    <script src="js/jquery.js"></script>
    <script src="js/plugins.js"></script>

    <!-- Footer Scripts
    ============================================= -->
    <script src="js/functions.js"></script>
@endsection