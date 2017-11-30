@extends('main.resources.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/other.css">
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
							<p>{!! trans('other.index.subtitle') !!}</p>
						</div>
						<div class="p-title">
							<p>{!! trans('other.index.title') !!}</p>
						</div>
						<div class="row row-list">
							<div class="col-md-6">
								<ul class="topic">
									<li><a href="/other-topics/underage">{!! trans('other.index.topic-1') !!}</a></li>
									<li><a href="/other-topics/pregnant-women">{!! trans('other.index.topic-2') !!}</a></li>
									<li><a href="/other-topics/retirees">{!! trans('other.index.topic-3') !!}</a></li>
									<li><a href="/other-topics/incarcerated-people">{!! trans('other.index.topic-4') !!}</a></li>
									<li><a href="/other-topics/military-veterans">{!! trans('other.index.topic-5') !!}</a></li>
								</ul>
							</div>
							<div class="col-md-6">
								<ul class="topic">
									<li><a href="/other-topics/people-disabilities">{!! trans('other.index.topic-6') !!}</a></li>
									<li><a href="/other-topics/same-sex">{!! trans('other.index.topic-7') !!}</a></li>
									<li><a href="/other-topics/transgender">{!! trans('other.index.topic-8') !!}</a></li>
									<li><a href="/other-topics/american-indian">{!! trans('other.index.topic-9') !!}</a></li>
									<li><a href="/other-topics/people-medicare">{!! trans('other.index.topic-10') !!}</a></li>
								</ul>
							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="row text-center">
				<div class="back-a">
					<a href="/askparrot"><img src="/assets/icons/back.png" alt=""></a>
				</div>
			</div>
		</div>
	</div>
 	@include('main.partials.templates.health-modals')
@endsection

@section('scripts')
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
	sidebar.init();
</script>
<script type="text/javascript" src="/assets/js/health.js"></script>
<script type="text/javascript">
  health.init();
</script>
@endsection
