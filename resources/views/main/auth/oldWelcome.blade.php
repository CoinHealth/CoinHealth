@extends('main.partials.base')

@section('styles')
	<link rel="stylesheet" href="/assets/css/sidebar.css">
	{{-- badge --}}
  <link rel="stylesheet" type="text/css" href="/assets/css/vendor/badge/dialog.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/vendor/badge/dialog-jim.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/badge.css">
	{{-- badge --}}
	<link rel="stylesheet" href="/assets/css/auth.css">
@endsection

@section('content')
	@if (!$user->prevent_modal)
		@include('main.partials.modal-premium-apply')
	@endif
<div class='row'>
	<input type="hidden" class="badge" value="{{ session()->get('Badge') }}" id="Badge">
	<input type="hidden" class="badge" value="{{ session()->get('LeveledUp') }}" id="LeveledUp">
	<input type="hidden" class="badge" value="{{ session()->get('BadgeIcon') }}" id="badgeIcon">
	<input type="hidden" id="purpose" value="{{ $user->purpose }}">
	<div class='welcome-wrapper text-center'>
		<div class='overlay'>
			<div class='cp-logo'>
				<img class='img-responsive' src='/assets/icons/careparrot-icon-trans.png' />
			</div>
			<div class='message'>
				<h1 class='greetings'>{!! trans('auth.welcome') !!}{{ $user->name ? $user->name : $user->username }}!</h1>
				<p class='description'>
					{!! trans('auth.description') !!}
				</p>
				@if ($user->purpose == 1)
				<p class='profile'>
					<a href='/profile'>
						<img class='img-responsive' src='/assets/icons/addon-user.png' />
						<span>{!! trans('auth.view_profile_user') !!}</span>
					</a>
				</p>
				@elseif ($user->purpose == 2)
				<p class="msg">
					{!! trans('auth.view_profile_hp') !!}
				</p>
				@elseif($user->purpose == 3)
				<p class="msg">
					{!! trans('auth.view_profile_agent') !!}
				@endif

			</div>
		</div>
	</div>
	@include('main.partials.sidebar')
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
	<script src="/assets/js/sidebar.js"></script>
	<script type="text/javascript">
		sidebar.init();
		$(function() {
			$('#modal-apply').on('shown.bs.modal', function() {
				if ($('#purpose').val() === 3) {
					$(this).find('#yes').attr({
						href: '/careconnect/create-agent'
					});
				}
				else if ($('#purpose').val() === 2) {
					$(this).find('#yes').attr({
						href: '/careconnect/create-doctor'
					});
				}
			}).on('hide.bs.modal', function() {
				if ($('#prevent').is(':checked')) {
					$.post('/auth/prevent', {
						_token: csrf_token,
					});
				}
			});
			setTimeout(function() {
				$('#modal-apply').modal('show');
			}, 3000);

		});
	</script>

@endsection
