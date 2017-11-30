@extends('main.careconnect.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/partnerships.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	@include('main.partials.sidebar')
<div class="partneships-container">
	<div class="dark-green">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p>
						{!! trans('partnerships.looking-for') !!}<br>
						{!! trans('partnerships.partner') !!}
					</p>
					<div class="clear"></div>
					<a href="/about/contact">{!! trans('partnerships.talk') !!}</a>
				</div>
			</div>
		</div>
	</div>

	<div class="light-green">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p>
						{!! trans('partnerships.invest') !!}<br>
						{!! trans('partnerships.something-big') !!}
					</p>
				</div>
			</div>
			<img src="/assets/icons/bigdata_vector.png" alt="">
		</div>
	</div>

	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p>
						{!! trans('partnerships.partner-content') !!}
					</p>
				</div>
			</div>
		</div>
	</div>

	<!-- <div class="blank-bg"></div> -->
</div>	


@endsection

@section('scripts')
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
	sidebar.init();
</script>
@endsection
