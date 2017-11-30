@extends('main.about.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/terms.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lato:400,100,300,700,900italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="/assets/css/health.css">
@endsection

@section('content.inner')
@include('main.terms.header')
@include('main.partials.sidebar')

<div class="about-container">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<p class="title">
					Fueled by passion for Care and Wellness
				</p>
				<p class="subtitle">
					Finding care shouldn't feel like rocket science.
				</p>
				<p class="fancy"><span>Terms</span></p>
			</div>
		</div>
	</div>
</div>

<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<p>
					Join a Community and meet other local CareParrot Members.
				</p>
				<p>
					Never stress again. We've created an online <span>CareCommunity</span> where we collaborate with other
					Corporate Partners and use direct feedback from our membership to help improve Care and
					lower out-of-pocket expenses. Being healthy is a right and should be accessible for all.
				</p>
				<p>
					You will be able to <span>connect</span> with friends, family and CareParrot to share ideas, photos, create
					your own meet up groups (for healthy and fun activities) all with the purpose of making
					Health Care FUN.
				</p>
				<div class="back">
					<a href="/askparrot" class="a-back">
						<img src="/assets/icons/back.png" alt="">
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
@include('main.partials.templates.health-modals')
@endsection

@section('scripts')
<script type="text/javascript" src="/assets/js/about.js"></script>
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
	sidebar.init();
</script>
<script type="text/javascript" src="/assets/js/health.js"></script>
<script type="text/javascript">
  health.init();
</script>
@endsection
