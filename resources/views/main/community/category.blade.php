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
	<div class="category-container">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<div class="care-img">
						<img src="/assets/icons/carecat.png" alt="">
					</div>
				</div>
				<div class="col-md-6">
					<div class="forum-preview-wrapper"><img src="/assets/icons/forums/preview.png" alt="" class="img-responsive"></div>
				</div>
			</div>
			<div class="carelist-container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="box">
							<p class="box-desc desc2">
								{!! trans('carecommunity.forum-desc') !!}
								{!! trans('carecommunity.file-sharing-desc') !!}
							</p>
						</div>
						<div class="clear"></div>
					</div>
				</div>

				<div class="row">
					<div class="btn-go text-center">
						<a href="/community/forums" class="com-go">{!! trans('carecommunity.go') !!}</a>
					</div>
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
<script src="/assets/js/activity.js"></script>
<script type="text/javascript">
	activity.initCommunity();
</script>
@endsection
