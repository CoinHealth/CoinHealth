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
				<p class="fancy"><span class="icon"><img src="/assets/icons/culture.png" alt=""> {!! trans('about.culture-fancy') !!}</span></p>
			</div>
		</div>
	</div>
</div>

<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<p>
					{!! trans('about.cp-mascot') !!}
				</p>

				<ul>
					<li><p>{!! trans('about.mean-say') !!}</p></li>
					<li><p>{!! trans('about.cultural-diversity') !!}</p></li>
					<li><p>{!! trans('about.quirkiness') !!}</p></li>
					<li><p>{!! trans('about.feedback-desired') !!}</p></li>
					<li><p>{!! trans('about.protect-privacy') !!}</p></li>
					<li><p>{!! trans('about.keep-simple') !!}</p></li>
					<li><p>{!! trans('about.equality') !!}</p></li>
					<li><p>{!! trans('about.strive-improvement') !!}.</p></li>
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
