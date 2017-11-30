@extends('main.about.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/about.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lato:400,100,300,700,900italic' rel='stylesheet' type='text/css'>
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
				<p class="fancy"><span class="icon"><img src="/assets/icons/sustainability.png" alt=""> {!! trans('about.sustainability-fancy') !!}</span></p>
			</div>
		</div>
	</div>
</div>

<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<p class="p-title">
					{!! trans('about.reduce-foot-print') !!}
				</p>
				<ul>
					<li>
						<p>{!! trans('about.reduce-paperwork') !!}</p>
					</li>
					<li>
						<p>{!! trans('about.digital-svc') !!}</p>
					</li>
					<li>
						<p>{!! trans('about.recycling-svc') !!}</p>
					</li>
					<li>
						<p>{!! trans('about.better-products') !!}</p>
					</li>
					<li>
						<p>{!! trans('about.being-great') !!}</p>
					</li>
					<li>
						<p>{!! trans('about.being-transparent') !!}</p>
					</li>
					<li>
						<p>{!! trans('about.commit-benefit') !!}</p>
					</li>
					<li>
						<p>{!! trans('about.integrate-sustain') !!}</p>
					</li>
					<li>
						<p>{!! trans('about.beneficial-tech-svc') !!}</p>
					</li>
					<li>
						<p>{!! trans('about.disrupt-evrythng') !!}</p>
					</li>
				</ul>
				<div class="back">
					<a href="/askparrot" class="a-back">
						<img src="/assets/icons/back.png" alt="">
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="/assets/js/about.js"></script>
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
	sidebar.init();
</script>
@endsection
