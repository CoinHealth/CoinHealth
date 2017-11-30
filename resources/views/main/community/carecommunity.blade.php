@extends('main.community.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/carecommunity.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	<div class="main-header">
		<div class='main-cp-icon col-xs-12'>
			<a href="/">
				<img src="/assets/icons/careparrot-icon-trans.png" class='img-responsive'>
			</a>
		</div>
	</div>
	@include('main.partials.sidebar')
	<div class="carecommunity-container">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<div class="care-img">
						<img src="{!! trans('carecommunity.pic_carecommunity') !!}" alt="">
					</div>
				</div>
				<div class="col-md-6">
					<p class="desc">
						{!! trans('carecommunity.desc1') !!}<br>
						{!! trans('carecommunity.desc2') !!}<br>
						{!! trans('carecommunity.desc3') !!}<br>
						{!! trans('carecommunity.desc4') !!}
					</p>
					<div class="btn-center">
						<a href="/community/category" class="btn-pink">{!! trans('carecommunity.join') !!}</a>
						<a href="/" class="not-now">{!! trans('carecommunity.not-now') !!}</a>
						<a href="/community/wall" class="pink-a">Go directly to community</a>
					</div>

				</div>
			</div>
			{{--
			<div class="row text-center">
				<div class="back-a">
					<a href="/community/community-setup"><img src="/assets/icons/next.png" alt=""></a>
				</div>
			</div> --}}
		</div>
	</div>
@endsection

@section('scripts')
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
	sidebar.init();
</script>
<script src="/assets/js/activity.js"></script>
<script type="text/javascript">
	activity.initCommunity();
</script>
@endsection
