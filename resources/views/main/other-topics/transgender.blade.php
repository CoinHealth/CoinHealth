@extends('main.askparrot.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/transgender.css">
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
							<p>Frequently asked questions about Health Insurance</p>
						</div>
						<div class="p-title">
							<p>{!! trans('other.transgender.title') !!}</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row row-market row-2">
				<div class="col-md-12">
					<p>
						{!! trans('other.transgender.part_1.important') !!}
					</p>
					<p>
						{!! trans('other.transgender.part_1.applying') !!}
					</p>
					<p>
						{!! trans('other.transgender.part_1.coverage') !!}
					</p>
					<p>
						{!! trans('other.transgender.part_1.application') !!}
					</p>
				</div>
				<div class="row-nav row-nav-1">
					<div class="slider-nav">
					    <a href="/other-topics" class="back"><img src="/assets/icons/back.png" alt=""></a> <a href="javascript:void(0);" class="next"><img src="/assets/icons/next.png" alt=""></a>
					</div>
				</div>
			</div>
			<div class="row row-market row-3">
				<div class="col-md-12">
					<p>
						{!! trans('other.transgender.part_2.note') !!}
					</p>
					<p>
						{!! trans('other.transgender.part_2.name') !!}
					</p>
					<p>
						{!! trans('other.transgender.part_2.services') !!}
					</p>
					<p>
						{!! trans('other.transgender.part_2.marketplace') !!}
					</p>
					<p>
						{!! trans('other.transgender.part_2.health') !!}
					</p>
				</div>
				<div class="row-nav row-nav-2">
					<div class="slider-nav">
					    <a href="javascript:void(0);" class="back"><img src="/assets/icons/back.png" alt=""></a> <a href="javascript:void(0);" class="next"><img src="/assets/icons/next.png" alt=""></a>
					</div>
				</div>
			</div>
			<div class="row row-market row-4">
				<div class="col-md-12">
					<p>
						{!! trans('other.transgender.part_3.coverage') !!}
					</p>
					<p>
						{!! trans('other.transgender.part_3.coverage') !!}
					</p>
					<p>
						{!! trans('other.transgender.part_3.health') !!}
					</p>
					<p>
						{!! trans('other.transgender.part_3.enroll') !!}
					</p>
				</div>
				<div class="row-nav row-nav-3">
					<div class="slider-nav">
					    <a href="javascript:void(0);" class="back"><img src="/assets/icons/back.png" alt=""></a> <a href="javascript:void(0);" class="next"><img src="/assets/icons/next.png" alt=""></a>
					</div>
				</div>
			</div>
			<div class="row row-market row-5">
				<div class="col-md-12">
					<p>
						{!! trans('other.transgender.part_4.exclusions') !!}
					</p>
					<p>
						{!! trans('other.transgender.part_4.exclusions') !!}
					</p>
					<p>
						{!! trans('other.transgender.part_4.enrolled') !!}
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
