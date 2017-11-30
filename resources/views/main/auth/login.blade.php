@extends('main.auth.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/auth.css">
@endsection

<div class="login-div">

@section('content.inner')
	@include('main.partials.sidebar')
	<div class='auth-wrapper text-center'>
		<div class='col-xs-6 auth-menu active'>
			<a href='/auth/login'>{!! trans('auth.log-in') !!}</a>
		</div>
		<div class='col-xs-6 auth-menu'>
			<a href='/auth/register'>{!! trans('auth.register') !!}</a>
		</div>
		<div class='col-xs-12 form-wrapper'>
			@if(session('register.success'))
				<div class='alert alert-success'>
					<p>{!! trans('auth.reg-suc') !!}</p>
				</div>
			@endif
			@if(session('forgot'))
				<div class='alert alert-success'>
					<p>{!! trans('auth.check-pass') !!}</p>
				</div>
			@endif
			@if (session()->has('login.require'))
				<div class="alert alert-warning">
					<p>{{ session('login.require') }}</p>
				</div>
			@endif
			@if (session('error'))
				<div class='alert alert-danger'>
					@foreach(session('error') as $err)
						<p>{{ $err }}</p>
					@endforeach
				</div>
			@endif

			<form method='post' action='/auth/login'>
				<input type='hidden' name='_token' value='{{ csrf_token() }}' />
				<div class="form-group">
					<a role='button' href="/auth/login/facebook" class="oauth-btn btn btn-block btn-facebook">
						<i class="pull-left fa fa-facebook"></i> {!! trans('auth.log-fb') !!}
					</a>
					<a role='button' href="/auth/login/google" class="oauth-btn btn btn-block btn-google">
						<i class="pull-left fa fa-google-plus"></i> {!! trans('auth.sign-google') !!}
					</a>
				</div>
				<div class='hr-group-or'><hr/><p>{!! trans('auth.or') !!}</p><hr/></div>
				<div class='form-group'>
					<div class="input-group" style="width: auto;">
						<label for='username' class="input-group-addon">
							<img class='' src='/assets/icons/addon-user.png' />
						</label>
						<input type='text' name='username' id='username' class='form-control text-center' placeholder="{!! trans('auth.username') !!}" />
					</div>
				</div>
				<div class='form-group'>
					<div class="input-group">
						<label for='password' class="input-group-addon">
							<img class='' src='/assets/icons/addon-lock.png' />
						</label>
						<input type='password' name='password' id='password' class='form-control text-center' placeholder="{!! trans('auth.password') !!}" />
					</div>
				</div>
				<div class="form-group text-left">
					<label for="remember_me">
						{{-- <input type="checkbox" name="remember_me" id="remember_me"> --}}
					</label>
					<a href="/auth/forgot-password" class="btn-link pull-right">{!! trans('auth.forgot-pass') !!}</a>
				</div>
				<hr />
				<button class='btn btn-block btn-submit'>{!! trans('auth.sub-log-in') !!}</button>
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
