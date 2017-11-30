@extends('main.partials.base')


@section('content')
	@include('main.partials.sidebar')
	<div class="main-header row">
		<div class='main-cp-icon col-xs-12'>
			<a href="/"><img src="/assets/icons/careparrot-icon-trans.png" class='img-responsive'></a>
			@if (auth()->check())
			<a href="/profile" class="header-profile pull-right">Profile</a>
			@endif
		</div>
	</div>

	<div class="row">
		<div class="search-container">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<div class="pull-left">
							<a href="/#section3" class="home-back">
								<i class="fa fa-home fa-lg" aria-hidden="true"></i>
							</a>
						</div>
					</div>
				</div>

				<div class="row row-search">
					@yield('content.inner')
				</div>
			</div>
		</div>
	</div>

	<div class="slide-btn">
		<i class="fa fa-angle-down fa-2x" aria-hidden="true"></i>
	</div>

@endsection

@push('scripts2')
<script src="/assets/js/apis/login.js"></script>
<script src="/assets/js/sidebar.js"></script>
<script>
	sidebar.init();
</script>
@endpush
