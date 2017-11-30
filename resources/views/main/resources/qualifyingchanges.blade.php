@extends('main.resources.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/resources.css">
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
							<p>{!! trans('resource_center.p_subtitle_2') !!}</p>
						</div>
						<div class="p-title">
							<p>{!! trans('resource_center.p_title_2') !!}</p>
						</div>
					</div>
				</div>
			</div>

			<div class="row btn-row-loss">
				<div class="col-md-offset-4 col-md-8">
					<ul>
						<li>{!! trans('resource_center.list_2_1') !!}</li>
						<li>{!! trans('resource_center.list_2_2') !!}</li>
						<li>{!! trans('resource_center.list_2_3') !!}</li>
						<li>{!! trans('resource_center.list_2_4') !!}</li>
						<li>{!! trans('resource_center.list_2_5') !!}</li>
					</ul>
				</div>
			</div>
			<div class="row-nav row-nav-3">
				<div class="slider-nav">
					<a href="/askparrot/main-specialenroll" class="back"><img src="/assets/icons/back.png" alt=""></a>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
	sidebar.init();
</script>
@endsection
