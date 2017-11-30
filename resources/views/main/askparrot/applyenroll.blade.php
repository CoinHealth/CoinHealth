@extends('main.askparrot.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/applyenroll.css">
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
							<p>How to apply and enroll</p>
						</div>
						<div class="p-title">
							<p>{!! trans('askparrot.getting_coverage') !!}</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row row-market row-2">
				<div class="col-md-offset-5 col-md-7">
					<ol>
						<li>
							<p>
								{!! trans('askparrot.apply_sentence_1') !!}
							</p>
						</li>
						<li>
							<p>
								{!! trans('askparrot.apply_sentence_2') !!}
							</p>
						</li>
						<li>
							<p>
								{!! trans('askparrot.apply_sentence_3') !!}
							</p>
						</li>
						<li>
							<p>
								{!! trans('askparrot.apply_sentence_4') !!}
							</p>
						</li>
					</ol>

				</div>
			</div>
			<div class="row-nav row-nav-1">
				<div class="slider-nav">
				    <a href="/askparrot" class="back"><img src="/assets/icons/back.png" alt=""></a>
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
