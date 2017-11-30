@extends('main.auth.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/auth.css">
@endsection

<div class="login-div">

@section('content.inner')
	@include('main.partials.sidebar')
	<div class='auth-wrapper text-center'>
		<div class='col-md-6 auth-menu active'>
			<a href='/auth/forgot-password'>{!! trans('auth.forgot-pass-uc') !!}</a>
		</div>
    <div class='col-md-6 auth-menu'>
			<a href='/auth/login'>{!! trans('auth.log-in') !!}</a>
		</div>
		<div class='col-xs-12 form-wrapper'>
			@if(session('message'))
				<div class='alert alert-warning'>
					<p>{{ session()->get('message') }}</p>
				</div>
			@endif
			@if (session('error'))
				<div class='alert alert-danger'>
					@foreach(session('error') as $err)
						<p>{{ $err }}</p>
					@endforeach
				</div>
			@endif

			<form method='post' action='/auth/forgot-password'>
				<input type='hidden' name='_token' value='{{ csrf_token() }}' />

				<div class='form-group'>
					<div class="input-group" style="width: auto;">
						<label for='email' class="input-group-addon">
							<img class='' src='/assets/icons/addon-user.png' />
						</label>
						<input type='email' required name='email' id='email' class='form-control text-center' placeholder="{!! trans('auth.email') !!}" />
					</div>
				</div>
				<hr />
				<button class='btn btn-block btn-submit'>{!! trans('auth.submit') !!}</button>
			</form>
		</div>
	</div>
@endsection
</div>

@section('scripts')
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
	sidebar.init();
</script>
@endsection
