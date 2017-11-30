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
				<p class="fancy"><span class="icon"><img src="/assets/icons/abouti.png" alt=""> {!! trans('about.about-fancy') !!}</span></p>
			</div>
		</div>
	</div>
</div>

<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>{!! trans('privacy-terms.permission') !!}</h1>
				<p>{!! trans('privacy-terms.permission-desc1') !!}</p>
				<h1>{!! trans('privacy-terms.privacy-act') !!}</h1>
				<p>{!! trans('privacy-terms.privacy-act-desc1') !!}</p>
				<p>{!! trans('privacy-terms.privacy-act-desc2') !!}</p>
				<p>{!! trans('privacy-terms.privacy-act-desc3') !!}</p>
				<p>{!! trans('privacy-terms.privacy-act-desc4') !!}</p>
				<ol>
					<li>{!! trans('privacy-terms.privacy-act-li1') !!}</li>
					<li>{!! trans('privacy-terms.privacy-act-li2') !!}</li>
					<li>{!! trans('privacy-terms.privacy-act-li3') !!}</li>
					<li>{!! trans('privacy-terms.privacy-act-li4') !!}</li>
					<li>{!! trans('privacy-terms.privacy-act-li5') !!}</li>
					<li>{!! trans('privacy-terms.privacy-act-li6') !!}</li>
					<li>{!! trans('privacy-terms.privacy-act-li7') !!}</li>
				</ol>
				<h1>{!! trans('privacy-terms.identity') !!}</h1>
				<p>{!! trans('privacy-terms.identity-desc1') !!}</p>
        <ul>
					<li>{!! trans('privacy-terms.identity-li1') !!}</li>
					<li>{!! trans('privacy-terms.identity-li2') !!}</li>
					<li>{!! trans('privacy-terms.identity-li3') !!}</li>
        </ul>
        <p>{!! trans('privacy-terms.identity-desc1') !!} <a href='https://www.healthcare.gov/how-we-use-your-data' target="_blank">'https://www.healthcare.gov/how-we-use-your-data</a>.</p>
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
