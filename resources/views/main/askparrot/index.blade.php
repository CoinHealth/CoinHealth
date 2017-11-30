@extends('main.resources.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/askparrot.css">
<link rel="stylesheet" href="/assets/css/sidebar.css">
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
	<div class="ask-parrot-container">
		<div class="container">
			<div class="row">

			</div>
			<div class="row">
				<div class="col-md-offset-2 col-md-8">
					<p class="title">
						{!! trans('askparrot.index.title') !!}
					</p>
					{{-- <form id="search-form" class="form-inline" role="form" method="post"> --}}
						{{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
						<div class="input-group">
							<input type="text" class="form-control search-form" name="keyword" placeholder="{!! trans('askparrot.index.type') !!}">
							<span class="input-group-btn">
								<button type="button" class="btn btn-primary search-btn" data-target="#search-form">{!! trans('askparrot.index.search') !!}
							</span>
						</div>
					{{-- </form> --}}
					<p class="subtitle">
						{!! trans('askparrot.index.subtitle') !!}
					</p>
				</div>
			</div>

			<div class="row list-row main-topics">
				<div class="col-md-8 col-md-push-2">
					<div class="col-md-6">
						<ul class="topic">
							<li><a href="/askparrot/main-specialenroll">{!! trans('askparrot.index.special_enrollment') !!}</a></li>
							<li><a href="/resource-center/calendar">{!! trans('askparrot.index.open_enrollment') !!}</a></li>
							<li><a href="/askparrot/marketplace">{!! trans('askparrot.index.marketplace') !!}</a></li>
							<li><a href="/about">{!! trans('askparrot.index.about') !!}</a></li>
							<li><a href="/faq">{!! trans('askparrot.index.things_easier') !!}</a></li>
						</ul>
					</div>
					<div class="col-md-6">
						<ul class="topic">
							<li><a href="/askparrot/applyenroll">{!! trans('askparrot.index.apply_enroll') !!}</a></li>
							<li><a href="/askparrot/marketplace-plan">{!! trans('askparrot.index.change_update') !!}</a></li>
							<li><a href="/complicated-cases/">{!! trans('askparrot.index.complicated_cases') !!}</a></li>
							<li><a href="/job-based">{!! trans('askparrot.index.job_based') !!}</a></li>
							<li><a href="/other-topics">{!! trans('askparrot.index.other') !!}</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row list-row">
				<div class="col-md-8 col-md-push-2 search-lists">
					<p class="search-item"
						data-keyword="enrollment|special">
						<a href="/askparrot/main-specialenroll">{!! trans('askparrot.index.special_enrollment') !!}</a>
					</p>
					<p class="search-item"
						data-keyword="enrollment|open">
						<a href="/resource-center/calendar">{!! trans('askparrot.index.open_enrollment') !!}</a>
					</p>
						<p class="search-item"
						data-keyword="guide|marketplace">
						<a href="/askparrot/marketplace">{!! trans('askparrot.index.marketplace') !!}</a>
					</p>
						<p class="search-item"
						data-keyword="about">
						<a href="/about">{!! trans('askparrot.index.about') !!}</a>
					</p>
						<p class="search-item"
						data-keyword="faq">
						<a href="/faq">{!! trans('askparrot.index.things_easier') !!}</a>
					</p>
						<p class="search-item"
						data-keyword="apply|enrollment">
						<a href="/askparrot/applyenroll">{!! trans('askparrot.index.apply_enroll') !!}</a>
					</p>
						<p class="search-item"
						data-keyword="change|update|plan">
						<a href="/askparrot/marketplace-plan">{!! trans('askparrot.index.change_update') !!}</a>
					</p>
						<p class="search-item"
						data-keyword="cases|circumstances|prevail">
						<a href="/complicated-cases/">{!! trans('askparrot.index.complicated_cases') !!}</a>
					</p>
						<p class="search-item"
						data-keyword="insurance|job|benefits">
						<a href="/job-based">{!! trans('askparrot.index.job_based') !!}</a>
					</p>
						<p class="search-item"
						data-keyword="underage">
						<a href="/other-topics/underage">{!! trans('other.index.topic-1') !!}</a>
					</p>
						<p class="search-item"
						data-keyword="pregnant">
						<a href="/other-topics/pregnant-women">{!! trans('other.index.topic-2') !!}</a>
					</p>
						<p class="search-item"
						data-keyword="retirees|retired">
						<a href="/other-topics/retirees">{!! trans('other.index.topic-3') !!}</a>
					</p>
						<p class="search-item"
						data-keyword="prison|incarcerated|jail|confined">
						<a href="/other-topics/incarcerated-people">{!! trans('other.index.topic-4') !!}</a>
					</p>
						<p class="search-item"
						data-keyword="veteran|tricare|champva|military">
						<a href="/other-topics/military-veterans">{!! trans('other.index.topic-5') !!}</a>
					</p>
						<p class="search-item"
						data-keyword="disabled|medicaid|medicare">
						<a href="/other-topics/people-disabilities">{!! trans('other.index.topic-6') !!}</a>
					</p>
						<p class="search-item"
						data-keyword="marriage|same-sex|couple|same|sex">
						<a href="/other-topics/same-sex">{!! trans('other.index.topic-7') !!}</a>
					</p>
						<p class="search-item"
						data-keyword="gay|lesbian|transgender|gender change|transsexualism|identity">
						<a href="/other-topics/transgender">{!! trans('other.index.topic-8') !!}</a>
					</p>
						<p class="search-item"
						data-keyword="ANCSA|indians|alaska|native">
						<a href="/other-topics/american-indian">{!! trans('other.index.topic-9') !!}</a>
					</p>
						<p class="search-item"
						data-keyword="medicare|medicaid">
						<a href="/other-topics/people-medicare">{!! trans('other.index.topic-10') !!}</a>
					</p>
				</div>
			</div>
			<div class="row text-center">
				<div class="back-a">
					<a href="/careconnect"><img src="/assets/icons/back.png" alt=""></a>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
<script src="/assets/js/sidebar.js"></script>
<script src="/assets/js/askparrot.js"></script>
<script type="text/javascript">
$(function() {
	sidebar.init();
	ask.init();
});
</script>

@endsection
