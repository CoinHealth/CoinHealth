@extends('main.faq.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/faq.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="/assets/css/health.css">
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
	<div class="loss-health-2-container">
		<div class="container">
			<div class="row">
			</div>
			<div class="row">
				<div class="loss-title">
					<div class="col-md-12">
						<div class="p-subtitle">
							<p>{!! trans('faq.subtitle') !!}</p>
						</div>
						<div class="p-title">
							<p>{!! trans('faq.title') !!}</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row btn-row">
				<div class="btn-div-loss">
					<div class="btn-loss btn-loss-1">
						<a href="javascript:void(0);" class="a-loss-1">{!! trans('faq.loss_1') !!}</a><a href="javascript:void(0);" class="btn-close">x</a>
					</div>
					<div class="btn-loss btn-loss-2">
						<a href="javascript:void(0);" class="a-loss-2">{!! trans('faq.loss_2') !!}</a><a href="javascript:void(0);" class="btn-close">x</a>
					</div>
					<div class="btn-loss btn-loss-3">
						<a href="javascript:void(0);" class="a-loss-3">{!! trans('faq.loss_3') !!}</a><a href="javascript:void(0);" class="btn-close">x</a>
					</div>
					<div class="btn-loss btn-loss-4">
						<a href="javascript:void(0);" class="a-loss-4">{!! trans('faq.loss_4') !!}</a><a href="javascript:void(0);" class="btn-close">x</a>
					</div>
					<div class="back-a">
						<a href="/askparrot"><img src="/assets/icons/back.png" alt=""></a>
					</div>
				</div>
			</div>
			<div class="row btn-row-2">
				<div class="col-md-offset-6 col-md-6">
					<div class="btn-div-loss">
						<div class="btn-loss btn-loss-1">
							<a href="javascript:void(0);" class="a-loss-1">{!! trans('faq.loss_1') !!}</a><a href="javascript:void(0);" class="btn-close">x</a>
						</div>
						<div class="btn-loss btn-loss-2">
							<a href="javascript:void(0);" class="a-loss-2">{!! trans('faq.loss_2') !!}</a><a href="javascript:void(0);" class="btn-close">x</a>
						</div>
						<div class="btn-loss btn-loss-3">
							<a href="javascript:void(0);" class="a-loss-3">{!! trans('faq.loss_3') !!}</a><a href="javascript:void(0);" class="btn-close">x</a>
						</div>
						<div class="btn-loss btn-loss-4">
							<a href="javascript:void(0);" class="a-loss-4">{!! trans('faq.loss_4') !!}</a><a href="javascript:void(0);" class="btn-close">x</a>
						</div>
						<div class="back-a">
							<a href="/askparrot">Back</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row btn-row-loss btn-row-loss-1">
				<div class="col-md-offset-4 col-md-8">
					<p class="p-loss">
						{!! trans('faq.loss_1_desc_1') !!}
					</p>
					<p class="p-loss">
						{!! trans('faq.loss_1_desc_2') !!}
					</p>
				</div>
			</div>
			<div class="row btn-row-loss btn-row-loss-2">
				<div class="col-md-offset-4 col-md-8">
					<p class="p-loss">
						{!! trans('faq.loss_2_desc_1') !!}
					</p>

				</div>
			</div>
			<div class="row btn-row-loss btn-row-loss-3">
				<div class="col-md-offset-4 col-md-8">
					<p class="p-loss">
						{!! trans('faq.loss_3_desc_1') !!}
					</p>
				</div>
			</div>
			<div class="row btn-row-loss btn-row-loss-4">
				<div class="col-md-offset-4 col-md-8">
					<p class="p-loss">
						{!! trans('faq.loss_4_desc_1') !!}
					</p>
				</div>
			</div>
		</div>
	</div>
 	@include('main.partials.templates.health-modals')
@endsection

@section('scripts')
<script type="text/javascript">
	$(".a-loss-6").click(function () {
		$(".btn-loss-5").fadeOut();
		$(".btn-loss-4").fadeOut();
		$(".btn-loss-3").fadeOut();
		$(".btn-loss-2").fadeOut();
		$(".btn-loss-1").fadeOut();
		$(".back-a").fadeOut();
		$(".btn-row-loss-6").fadeIn();
		$(".btn-loss-6 .btn-close").fadeIn();
		$(this).addClass("bg-yellow");
	});

	$(".a-loss-5").click(function () {
		$(".btn-loss-6").fadeOut();
		$(".btn-loss-4").fadeOut();
		$(".btn-loss-3").fadeOut();
		$(".btn-loss-2").fadeOut();
		$(".btn-loss-1").fadeOut();
		$(".back-a").fadeOut();
		$(".btn-row-loss-5").fadeIn();
		$(".btn-loss-5 .btn-close").fadeIn();
		$(this).addClass("bg-yellow");
	});

	$(".a-loss-4").click(function () {
		$(".btn-loss-6").fadeOut();
		$(".btn-loss-5").fadeOut();
		$(".btn-loss-3").fadeOut();
		$(".btn-loss-2").fadeOut();
		$(".btn-loss-1").fadeOut();
		$(".back-a").fadeOut();
		$(".btn-row-loss-4").fadeIn();
		$(".btn-loss-4 .btn-close").fadeIn();
		$(this).addClass("bg-yellow");
	});

	$(".a-loss-3").click(function () {
		$(".btn-loss-6").fadeOut();
		$(".btn-loss-5").fadeOut();
		$(".btn-loss-4").fadeOut();
		$(".btn-loss-2").fadeOut();
		$(".btn-loss-1").fadeOut();
		$(".back-a").fadeOut();
		$(".btn-row-loss-3").fadeIn();
		$(".btn-loss-3 .btn-close").fadeIn();
		$(this).addClass("bg-yellow");
	});

	$(".a-loss-2").click(function () {
		$(".btn-loss-6").fadeOut();
		$(".btn-loss-5").fadeOut();
		$(".btn-loss-4").fadeOut();
		$(".btn-loss-3").fadeOut();
		$(".btn-loss-1").fadeOut();
		$(".back-a").fadeOut();
		$(".btn-row-loss-2").fadeIn();
		$(".btn-loss-2 .btn-close").fadeIn();
		$(this).addClass("bg-yellow");
	});

	$(".a-loss-1").click(function () {
		$(".btn-loss-6").fadeOut();
		$(".btn-loss-5").fadeOut();
		$(".btn-loss-4").fadeOut();
		$(".btn-loss-3").fadeOut();
		$(".btn-loss-2").fadeOut();
		$(".back-a").fadeOut();
		$(".btn-row-loss-1").fadeIn();
		$(".btn-loss-1 .btn-close").fadeIn();
		$(this).addClass("bg-yellow");
	});

	$(".btn-loss-6 .btn-close").click(function () {
		$(this).fadeOut();
		$(".btn-row-loss-6").fadeOut();
		$(".btn-loss-1").fadeIn();
		$(".btn-loss-2").fadeIn();
		$(".btn-loss-3").fadeIn();
		$(".btn-loss-4").fadeIn();
		$(".btn-loss-5").fadeIn();
		$(".back-a").fadeIn();
		$(".a-loss-6").removeClass("bg-yellow");
	});

	$(".btn-loss-5 .btn-close").click(function () {
		$(this).fadeOut();
		$(".btn-row-loss-5").fadeOut();
		$(".btn-loss-1").fadeIn();
		$(".btn-loss-2").fadeIn();
		$(".btn-loss-3").fadeIn();
		$(".btn-loss-4").fadeIn();
		$(".btn-loss-6").fadeIn();
		$(".back-a").fadeIn();
		$(".a-loss-5").removeClass("bg-yellow");
	});

	$(".btn-loss-4 .btn-close").click(function () {
		$(this).fadeOut();
		$(".btn-row-loss-4").fadeOut();
		$(".btn-loss-1").fadeIn();
		$(".btn-loss-2").fadeIn();
		$(".btn-loss-3").fadeIn();
		$(".btn-loss-5").fadeIn();
		$(".btn-loss-6").fadeIn();
		$(".back-a").fadeIn();
		$(".a-loss-4").removeClass("bg-yellow");
	});

	$(".btn-loss-3 .btn-close").click(function () {
		$(this).fadeOut();
		$(".btn-row-loss-3").fadeOut();
		$(".btn-loss-1").fadeIn();
		$(".btn-loss-2").fadeIn();
		$(".btn-loss-4").fadeIn();
		$(".btn-loss-5").fadeIn();
		$(".btn-loss-6").fadeIn();
		$(".back-a").fadeIn();
		$(".a-loss-3").removeClass("bg-yellow");
	});

	$(".btn-loss-2 .btn-close").click(function () {
		$(this).fadeOut();
		$(".btn-row-loss-2").fadeOut();
		$(".btn-loss-1").fadeIn();
		$(".btn-loss-3").fadeIn();
		$(".btn-loss-4").fadeIn();
		$(".btn-loss-5").fadeIn();
		$(".btn-loss-6").fadeIn();
		$(".back-a").fadeIn();
		$(".a-loss-2").removeClass("bg-yellow");
	});

	$(".btn-loss-1 .btn-close").click(function () {
		$(this).fadeOut();
		$(".btn-row-loss-1").fadeOut();
		$(".btn-loss-2").fadeIn();
		$(".btn-loss-3").fadeIn();
		$(".btn-loss-4").fadeIn();
		$(".btn-loss-5").fadeIn();
		$(".btn-loss-6").fadeIn();
		$(".back-a").fadeIn();
		$(".a-loss-1").removeClass("bg-yellow");
	});
</script>
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
	sidebar.init();
</script>
<script type="text/javascript" src="/assets/js/health.js"></script>
<script type="text/javascript">
  health.init();
</script>
@endsection
