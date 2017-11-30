@extends('main.partials.base')

@section('styles')
	<link rel="stylesheet" href="/assets/css/sidebar.css">
	{{-- badge --}}
  <link rel="stylesheet" type="text/css" href="/assets/css/vendor/badge/dialog.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/vendor/badge/dialog-jim.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/badge.css">
	{{-- badge --}}
	<link rel='stylesheet' href='/assets/css/finished.css' />
@endsection

@section('content')
@include('main.partials.sidebar')
{{-- @if (!$user->prevent_modal)
	@include('main.partials.modal-premium-apply')
@endif --}}
<input type="hidden" class="badge" value="{{ session()->get('Badge') }}" id="Badge">
<input type="hidden" class="badge" value="{{ session()->get('LeveledUp') }}" id="LeveledUp">
<input type="hidden" class="badge" value="{{ session()->get('BadgeIcon') }}" id="badgeIcon">
<div class='finished-container row'>
	<div class='careparrot-logo-full'>
		<img src='/assets/icons/careparrot-icon.png' class='img-responsive' />
	</div>
	<div class='welcome-message'>
		<div class='message'>
			<div class="overlay">
			<h1>
				{!! trans('landing.finished.thank_you') !!} {{ $name }}!
			</h1>
			<h3>{!! trans('landing.finished.get_in_touch') !!}</h3>
			<h3>
				{!! trans('landing.finished.meantime') !!}
			</h3>
			<h4>While you're waiting for our team's response, take time to <a href="/auth/register">create</a> an account and contribute to the CareCommunity!.</h4>
			<ul class='list-inline finished-icon'>
				<li>
					<a target="_blank" href='http://facebook.com/ilovecareparrot' class='f-icon'><img class='icon-fb ' src='/assets/icons/icon-fb.png' /></a>
				</li>
				<li>
					<a target="_blank" href='http://twitter.com/ilovecareparrot' class='f-icon'><img class='icon-twitter ' src='/assets/icons/icon-twitter.png' /></a>
				</li>
				<li>
					<a target="_blank" href='http://instagram.com/ilovecareparrot' class='f-icon'><img class='icon-instagram ' src='/assets/icons/icon-instagram.png' /></a>
				</li>
			</ul>
			</div>
		</div>
	</div>
</div>
<div class="row mobile-footer">
	<ul class='list-inline main-footer-icons'>
		<li>
			<a target="_blank" href='http://facebook.com/ilovecareparrot' class='f-icon'><img class='icon-fb ' src='/assets/icons/icon-fb.png' /></a>
		</li>
		<li>
			<a target="_blank" href='http://twitter.com/ilovecareparrot' class='f-icon'><img class='icon-twitter ' src='/assets/icons/icon-twitter.png' /></a>
		</li>
		<li>
			<a target="_blank" href='http://instagram.com/ilovecareparrot' class='f-icon'><img class='icon-instagram ' src='/assets/icons/icon-instagram.png' /></a>
		</li>
	</ul>
</div>
@include('main.partials.page-footer')
@include('main.partials.badge')
@endsection

@section('scripts')
	{{-- badge --}}
	<script type="text/javascript" src="/assets/js/vendor/badge/confetti.js"></script>
  <script type="text/javascript" src="/assets/js/vendor/badge/modernizr.custom.js"></script>
  <script type="text/javascript" src="/assets/js/vendor/badge/snap.svg-min.js"></script>
  <script type="text/javascript" src="/assets/js/vendor/badge/classie.js"></script>
  <script type="text/javascript" src="/assets/js/vendor/badge/dialogFx.js"></script>
  <script type="text/javascript" src="/assets/js/badge.js"></script>
  <script type="text/javascript">
  	badge.init();
  </script>
	{{-- badge --}}
	<script src="/assets/js/finished.js"></script>
	<script type="text/javascript">
		finished.init();
	</script>
	<script src="/assets/js/sidebar.js"></script>
	<script type="text/javascript">
		sidebar.init();
	</script>
@endsection
