@extends('main.resources.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/household.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	@include('main.partials.sidebar')
	<div class="loss-health-container">
		<div class="container">
			<div class="row">
				<div class="cp-logo">
					<img src="/assets/icons/careparrot-small.png" alt="">
				</div>
			</div>
			<div class="row">
				<div class="loss-title">
					<div class="col-md-12">
						<div class="p-subtitle">
							<p>Changes that qualify for a Special Enrollment Period</p>
						</div>
						<div class="p-title">
							<p>Change In Household Size</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row btn-row">
				<div class="btn-div-loss">
					<div class="btn-loss btn-loss-1">
						<a href="javascript:void(0);" class="a-loss-1">Got Married ></a><a href="javascript:void(0);" class="btn-close">x</a>
					</div>
					<div class="btn-loss btn-loss-2">
						<a href="javascript:void(0);" class="a-loss-2">Had a baby, adopted a child, or placed a child for foster care ></a><a href="javascript:void(0);" class="btn-close">x</a>
					</div>
					<div class="btn-loss btn-loss-3">
						<a href="javascript:void(0);" class="a-loss-3">Got divorced or legally separated and lost health insurance ></a><a href="javascript:void(0);" class="btn-close">x</a>
					</div>
					<div class="btn-loss btn-loss-4">
						<a href="javascript:void(0);" class="a-loss-4">Death ></a><a href="javascript:void(0);" class="btn-close">x</a>
					</div>
					<div class="back-a">
						<a href="/askparrot">< Back</a>
					</div>
				</div>
			</div>
			<div class="row btn-row-2">
				<div class="col-md-offset-6 col-md-6">
					<div class="btn-div-loss">
						<div class="btn-loss btn-loss-1">
							<a href="javascript:void(0);" class="a-loss-1">Got Married ></a><a href="javascript:void(0);" class="btn-close">x</a>
						</div>
					
						<div class="btn-loss btn-loss-2">
							<a href="javascript:void(0);" class="a-loss-2">Had a baby, adopted a child, or placed a child for foster care ></a><a href="javascript:void(0);" class="btn-close">x</a>
						</div>
						<div class="btn-loss btn-loss-3">
							<a href="javascript:void(0);" class="a-loss-3">Got divorced or legally separated and lost health insurance ></a><a href="javascript:void(0);" class="btn-close">x</a>
						</div>
						<div class="btn-loss btn-loss-4">
							<a href="javascript:void(0);" class="a-loss-4">Death ></a><a href="javascript:void(0);" class="btn-close">x</a>
						</div>
						<div class="back-a">
							<a href="/askparrot">< Back</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row btn-row-loss btn-row-loss-1">
				<div class="col-md-offset-4 col-md-8">
					<p class="p-loss">
						Pick a plan by the last day of the month and your coverage can start the first day of the next month
					</p>
				</div>
			</div>
			<div class="row btn-row-loss btn-row-loss-2">
				<div class="col-md-offset-4 col-md-8">
					<p class="p-loss">
						Your coverage can start the day of the event even if you enroll in the plan up to 60 days afterward
					</p>
				</div>
			</div>
			<div class="row btn-row-loss btn-row-loss-3">
				<div class="col-md-offset-4 col-md-8">
					<p class="p-loss">
						Divorce or legal separation without losing coverage doesn’t qualify you for a Special Enrollment Period
					</p>
				</div>
			</div>
			<div class="row btn-row-loss btn-row-loss-4">
				<div class="col-md-offset-4 col-md-8">
					<p class="p-loss">
						if someone on your Marketplace plan dies and as a result you’re no longer eligible for your current health plan
					</p>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
<script type="text/javascript">
	$(".a-loss-4").click(function () {
		$(".btn-loss-3").fadeOut();
		$(".btn-loss-2").fadeOut();
		$(".btn-loss-1").fadeOut();
		$(".back-a").fadeOut();
		$(".btn-row-loss-4").fadeIn();
		$(".btn-loss-4 .btn-close").fadeIn();
		$(this).addClass("bg-yellow");
	});

	$(".a-loss-3").click(function () {
		$(".btn-loss-4").fadeOut();
		$(".btn-loss-2").fadeOut();
		$(".btn-loss-1").fadeOut();
		$(".back-a").fadeOut();
		$(".btn-row-loss-3").fadeIn();
		$(".btn-loss-3 .btn-close").fadeIn();
		$(this).addClass("bg-yellow");
	});

	$(".a-loss-2").click(function () {
		$(".btn-loss-4").fadeOut();
		$(".btn-loss-3").fadeOut();
		$(".btn-loss-1").fadeOut();
		$(".back-a").fadeOut();
		$(".btn-row-loss-2").fadeIn();
		$(".btn-loss-2 .btn-close").fadeIn();
		$(this).addClass("bg-yellow");
	});

	$(".a-loss-1").click(function () {
		$(".btn-loss-4").fadeOut();
		$(".btn-loss-3").fadeOut();
		$(".btn-loss-2").fadeOut();
		$(".back-a").fadeOut();
		$(".btn-row-loss-1").fadeIn();
		$(".btn-loss-1 .btn-close").fadeIn();
		$(this).addClass("bg-yellow");
	});

	$(".btn-loss-4 .btn-close").click(function () {
		$(this).fadeOut();
		$(".btn-row-loss-4").fadeOut();
		$(".btn-loss-1").fadeIn();
		$(".btn-loss-2").fadeIn();
		$(".btn-loss-3").fadeIn();
		$(".back-a").fadeIn();
		$(".a-loss-4").removeClass("bg-yellow");
	});

	$(".btn-loss-3 .btn-close").click(function () {
		$(this).fadeOut();
		$(".btn-row-loss-3").fadeOut();
		$(".btn-loss-1").fadeIn();
		$(".btn-loss-2").fadeIn();
		$(".btn-loss-4").fadeIn();
		$(".back-a").fadeIn();
		$(".a-loss-3").removeClass("bg-yellow");
	});

	$(".btn-loss-2 .btn-close").click(function () {
		$(this).fadeOut();
		$(".btn-row-loss-2").fadeOut();
		$(".btn-loss-1").fadeIn();
		$(".btn-loss-3").fadeIn();
		$(".btn-loss-4").fadeIn();
		$(".back-a").fadeIn();
		$(".a-loss-2").removeClass("bg-yellow");
	});

	$(".btn-loss-1 .btn-close").click(function () {
		$(this).fadeOut();
		$(".btn-row-loss-1").fadeOut();
		$(".btn-loss-2").fadeIn();
		$(".btn-loss-3").fadeIn();
		$(".btn-loss-4").fadeIn();
		$(".back-a").fadeIn();
		$(".a-loss-1").removeClass("bg-yellow");
	});
</script>
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
	sidebar.init();
</script>
@endsection