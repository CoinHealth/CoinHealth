@extends('main.careconnect.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/careconnect.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	@include('main.partials.sidebar')
<div class="careconnect-container">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				<div class="carenow">
					<img src="/assets/icons/carenow.png" alt="">
				</div>

				<ul class="carelist">
					<li>Information on thousands of symptoms, health conditions and medical procedures</li>
					<li>A nationwide directory of hospitals, urgent care facilities, pharmacies, doctors and health professionals. </li>
					<li>Chat with one of our accredited Health Professionals to get a preliminary diagnosis</li>
				</ul>
				<div class="care-btn">
					<a href="javascript:void(0);" target="_blank" class="btn-orange">Coming Soon</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="carelist-container">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 nopadding">
				<div class="agent-portal">
					<a href="/careconnect/income-calculator"><img src="/assets/icons/agentportal.png" alt="" class="icon-care"></a>
					<div class="title">
						Agent Portal
					</div>
					<div class="desc">
						{!! trans('careconnect.calc-desc') !!}
					</div>
					<div class="btn-go">
						<a href="http://agents.careparrot.com/auth/login">{!! trans('careconnect.go') !!}</a>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 nopadding">
				<div class="calculator">
					<a href="/careconnect/income-calculator"><img src="/assets/icons/calculator.png" alt="" class="icon-care"></a>
					<div class="title">
						{!! trans('careconnect.income-calc') !!}
					</div>
					<div class="desc">
						{!! trans('careconnect.calc-desc') !!}
					</div>
					<div class="btn-go">
						<a href="/careconnect/income-calculator">{!! trans('careconnect.go') !!}</a>
					</div>
				</div>
			</div>
			<!-- <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 nopadding">
				<div class="doctor">
					<a href="/careconnect/doctor-search"><img src="/assets/icons/cparrot.png" alt="" class="icon-care"></a>
					<div class="title">
						{!! trans('careconnect.doc-search') !!}
					</div>
					<div class="desc">
						{!! trans('careconnect.doc-search-desc1') !!}
						 <p>
						 {!! trans('careconnect.doc-search-desc2') !!}
						 <p>
					</div>
					<div class="btn-go">
						<a href="/careconnect/doctor-search">{!! trans('careconnect.go') !!}</a>
					</div>
				</div>
			</div> -->
			<!-- <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 nopadding">
				<div class="rx">
					<a href="/careconnect/agent-finder"><img src="/assets/icons/agent.png" alt="" class="icon-care"></a>
					<div class="title">
						{!! trans('careconnect.crx-search') !!}
					</div>
					<div class="desc">
						{!! trans('careconnect.crx-search-desc') !!}
					</div>
					<div class="btn-go">
						<a href="/careconnect/agent-finder">{!! trans('careconnect.go') !!}</a>
					</div>
				</div>
			</div> -->
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 nopadding">
				<div class="help">
					<a href="/askparrot"><img src="/assets/icons/help.png" alt="" class="icon-care"></a>
					<div class="title">
						{!! trans('careconnect.care101') !!}
					</div>
					<div class="desc">
						{!! trans('careconnect.care101-desc') !!}
					</div>
					<div class="btn-go">
						<a href="/askparrot">{!! trans('careconnect.go') !!}</a>
					</div>
				</div>
			</div>
			<!-- <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 nopadding" data-toggle="tooltip" title="Coming soon">
				<div class="shop">
					<a href="/triage"><img src="/assets/icons/shop.png" alt="" class="icon-care"></a>
					<div class="title">
						Triage
					</div>
					<div class="desc">
						Doctors, treatments, medications and facilities all suggested just by telling us a little bit about yourself.
					</div>
					<div class="btn-go">
						<a href="/triage">{!! trans('careconnect.go') !!}</a>
					</div>
				</div>
			</div> -->
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 nopadding">
				<div class="partnerships">
					<a href="/careconnect/partnerships"><img src="/assets/icons/partnerships.png" alt="" class="icon-care"></a>
					<div class="title">
						{!! trans('careconnect.partnerships') !!}
					</div>
					<div class="desc">
						{!! trans('careconnect.partnerships-desc') !!}
					</div>
					<div class="btn-go">
						<a href="/careconnect/partnerships">{!! trans('careconnect.go') !!}</a>
					</div>
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
@endsection
