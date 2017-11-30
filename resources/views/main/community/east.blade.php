@extends('main.community.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/east.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="/assets/css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="/assets/css/owl.theme.css">
@endsection

@section('content.inner')
	@include('main.partials.sidebar')
	<div class="container-east">
		<div class="container">
			<div class="row">
				<div class="div-center">
					<img src="/assets/icons/whiteparrot.png" alt="" class="logo">
				</div>
			</div>
			<div class="row search-input">
				<div class="col-md-offset-2 col-md-8">
					<input type="text" placeholder="Search.." name="members" id="members" class="form-control typeahead members-typeahead form-control" autocomplete="off">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div id="owl-demo" class="owl-carousel owl-theme">
						@foreach($members as $member)
						<a href="/profile/overview/{{ $member->username }}">
							<div class="item member-wrapper" >
								<img class="member-avatar img-responsive" src="{{ $member->avatar_path }}" alt="{{ $member->full_name }}" />
								<p class="member-name">{{ $member->full_name }}</p>
							</div>
						</a>
						@endforeach
					</div>
				</div>
			</div>
			<div class="row">
				<p class="link"><a href="/community/community-ew" class="back">Back</a> |
					@if (auth()->check())
						<a href="/auth/logout" class="sign-out">Log out</a>
					@else
						<a href="/auth/login" class="sign-out">Log in</a>
					@endif
				</p>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
<script src="https://use.fontawesome.com/fb77c1567b.js"></script>
<script type="text/javascript" src="/assets/js/owl.carousel.js"></script>
<script src='/assets/js/vendor/typeahead/typeahead.bundle.min.js'></script>
<script type="text/javascript" src="/assets/js/datum/members.js"></script>
<script type="text/javascript" src="/assets/js/member.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	member.init();
  var owl = $("#owl-demo");
  owl.owlCarousel({
		items:8,
	});
});
</script>
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
	sidebar.init();
</script>
@endsection
