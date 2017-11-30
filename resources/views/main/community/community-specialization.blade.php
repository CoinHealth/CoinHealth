@extends('main.community.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/carecommunity.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	@include('main.partials.sidebar')
	<div class="specialization-container">
		<div class="container-fluid">
			<div class="row">
				<p class="q-title">{!! trans('carecommunity.specialization') !!}</p>
				<div class="centered">
					<form action="" class="special-form">
						<div class="radio">
						  <label>
						    <input type="radio">
						    {!! trans('carecommunity.spec-opt1') !!}
						  </label>
						</div>
						<div class="radio">
						  <label>
						    <input type="radio">
								{!! trans('carecommunity.spec-opt2') !!}
						  </label>
						</div>
						<div class="radio">
						  <label>
						    <input type="radio">
								{!! trans('carecommunity.spec-opt3') !!}
						  </label>
						</div>
						<div class="radio">
						  <label>
						    <input type="radio">
								{!! trans('carecommunity.spec-opt4') !!}
						  </label>
						</div>
						<div class="radio">
						  <label>
						    <input type="radio">
								{!! trans('carecommunity.spec-opt5') !!}
						  </label>
						</div>
						<div class="radio">
						  <label>
						    <input type="radio">
								{!! trans('carecommunity.spec-opt6') !!}
						  </label>
						</div>
					</form>
				</div>
			</div>
			<div class="row text-center">
				<div class="back-a">
					<a href="/community/community-setup"><img src="/assets/icons/next.png" alt=""></a>
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
