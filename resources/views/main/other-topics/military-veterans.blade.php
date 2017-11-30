@extends('main.askparrot.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/american.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	<div class="main-header row">
		<div class='main-cp-icon col-xs-12'>
			<a href="/">
				<img src="/assets/icons/careparrot-icon-trans.png" class='img-responsive'>
			</a>
		</div>
	</div>

	@include('main.partials.sidebar')
	<div class="loss-health-container">
		<div class="container">
			<div class="row">
				
			</div>
			<div class="row">
				<div class="loss-title">
					<div class="col-md-12">
						<div class="p-subtitle">
							<p>{!! trans('other.military-veterans.subtitle') !!}</p>
						</div>
						<div class="p-title">
							<p>{!! trans('other.military-veterans.title') !!}</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row row-market row-2">
				<div class="col-md-offset-5 col-md-7">
					<p>
						{!! trans('other.military-veterans.desc1-1') !!}
					</p>
					<p>
						{!! trans('other.military-veterans.desc1-2') !!}
					</p>
					<p>
						{!! trans('other.military-veterans.desc1-3') !!}
					</p>
				</div>
				<div class="row-nav row-nav-1">
					<div class="slider-nav">
					    <a href="/other-topics" class="back"><img src="/assets/icons/back.png" alt=""></a> <a href="javascript:void(0);" class="next"><img src="/assets/icons/next.png" alt=""></a>
					</div>
				</div>
			</div>
			<div class="row row-market row-3">
				<div class="col-md-offset-5 col-md-7">

						<ul>
							<li>{!! trans('other.military-veterans.desc2-1-li1') !!}</li>
							<li>{!! trans('other.military-veterans.desc2-1-li2') !!}</li>
							<li>{!! trans('other.military-veterans.desc2-1-li3') !!}</li>
						</ul>

					<p>
						{!! trans('other.military-veterans.desc2-2') !!} <br>
						<a href="http://va.gov/health">www.va.gov/health</a>
					</p>
				</div>
				<div class="row-nav row-nav-2">
					<div class="slider-nav">
					    <a href="javascript:void(0);" class="back"><img src="/assets/icons/back.png" alt=""></a> <a href="javascript:void(0);" class="next"><img src="/assets/icons/next.png" alt=""></a>
					</div>
				</div>
			</div>
			<div class="row row-market row-4">
				<div class="col-md-offset-5 col-md-7">
					<p>
						{!! trans('other.military-veterans.desc3-1') !!}
					</p>
					<p>
						{!! trans('other.military-veterans.desc3-2') !!}
					</p>
					<p>
						{!! trans('other.military-veterans.desc3-3') !!}
					</p>
					<p>
						{!! trans('other.military-veterans.desc3-4') !!}
					</p>
				</div>
				<div class="row-nav row-nav-3">
					<div class="slider-nav">
					    <a href="javascript:void(0);" class="back"><img src="/assets/icons/back.png" alt=""></a> <a href="javascript:void(0);" class="next"><img src="/assets/icons/next.png" alt=""></a>
					</div>
				</div>
			</div>
			<div class="row row-market row-5">
				<div class="col-md-offset-5 col-md-7">
					<p>
						{!! trans('other.military-veterans.desc4-1') !!}
					</p>
					<p>
						{!! trans('other.military-veterans.desc4-2') !!}
					</p>
					<p>
						{!! trans('other.military-veterans.desc4-3') !!}
					</p>
				</div>
				<div class="row-nav row-nav-4">
					<div class="slider-nav">
					    <a href="/other-topics" class="back"><img src="/assets/icons/back.png" alt=""></a>
					</div>
				</div>
			</div>

		</div>
	</div>
@endsection

@section('scripts')
<script type="text/javascript">
	$(".row-nav-1 .next").click(function () {
		$(".row-2").fadeOut();
		$(".row-3").fadeIn();
	});

	$(".row-nav-2 .next").click(function () {
		$(".row-3").fadeOut();
		$(".row-4").fadeIn();
	});

	$(".row-nav-2 .back").click(function () {
		$(".row-3").fadeOut();
		$(".row-2").fadeIn();
	});

	$(".row-nav-3 .next").click(function () {
		$(".row-4").fadeOut();
		$(".row-5").fadeIn();
	});

	$(".row-nav-3 .back").click(function () {
		$(".row-4").fadeOut();
		$(".row-3").fadeIn();
	});

	$(".row-nav-4 .next").click(function () {
		$(".row-5").fadeOut();
		$(".row-6").fadeIn();
	});

	$(".row-nav-4 .back").click(function () {
		$(".row-5").fadeOut();
		$(".row-4").fadeIn();
	});

	// $(".row-nav-2 .back").click(function () {
	// 	$(".row-3").fadeOut();
	// 	$(".row-2").fadeIn();
	// });


</script>
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
	sidebar.init();
</script>
@endsection
