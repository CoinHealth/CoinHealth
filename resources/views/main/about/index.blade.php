@extends('main.about.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/about.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lato:400,100,300,700,900italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="/assets/css/health.css">
@endsection

@section('content.inner')
@include('main.about.header')
@include('main.partials.sidebar')

<div class="about-container">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<p class="title">
					{!! trans('about.title') !!}
				</p>
				<p class="subtitle">
					{!! trans('about.subtitle') !!}
				</p>
				<p class="fancy"><span>{!! trans('about.carecommunity') !!}</span></p>
			</div>
		</div>
	</div>
</div>

<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<p>
					{!! trans('about.join-and-meet') !!}
				</p>
				<p>
					{!! trans('about.never-stress-again1') !!} <span>{!! trans('about.carecommunity') !!}</span> {!! trans('about.never-stress-again2') !!}
				</p>
				<p>
					{!! trans('about.making-hc-fun1') !!} <span>{!! trans('about.connect') !!}</span> {!! trans('about.making-hc-fun2') !!}
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
