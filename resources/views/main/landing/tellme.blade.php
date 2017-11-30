@extends('partials.base')

@push('styles')
	<link rel="shortcut icon" href="/assets/icons/logo.png">
    <link href="/assets/css/vendor/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/vendor/fontawesome/font-awesome.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="/assets/css/zoom.css">
	<link href="/assets/css/style.css" rel="stylesheet">
	<link rel='stylesheet' href='/assets/css/newsidebar.css' />
	<link rel='stylesheet' href='/assets/css/tellme.css' />
	<link rel='stylesheet' href='/assets/css/animate.css' />
	<link rel="stylesheet" type="text/css" href="/assets/css/vendor/jquery-fullPage/jquery.fullpage.min.css" />
	<link rel="stylesheet" href="/assets/css/agent-finder.css"> <!-- cath's note: fixed css and remove this-->
@endpush

@section('content')
@include('main.landing.partials.sidebar')
<div class="tellme-container" id="tellme">
	<subscribe :type="type"></subscribe>
	@if (auth()->check() && auth()->user()->isCrmCapable() )
		@include('main.landing.partials.crm')
	@else
		@include('main.landing.partials.ehr')
	@endif
</div>
@endsection

@push('scripts')
<script src="/js/tellme.js"></script>
<script type="text/javascript" src="/assets/js/sidebar_btn.js"></script>
@endpush
