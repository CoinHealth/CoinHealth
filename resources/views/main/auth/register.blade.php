@extends('main.auth.base')

@section('styles')
	<link rel="stylesheet" href="/assets/css/sidebar.css">
	<link rel="stylesheet" href="/assets/css/auth.css">
@endsection

@section('content.inner')
	@include('main.partials.sidebar')
	<div class='auth-wrapper text-center'>
		<div class='col-xs-6 auth-menu'>
			<a href='/auth/login'>{!! trans('auth.log-in') !!}</a>
		</div>
		<div class='col-xs-6 auth-menu active'>
			<a href='/auth/register'>{!! trans('auth.register') !!}</a>
		</div>
		<div class='col-xs-12 form-wrapper'>
			<form method='post' action='/auth/register'>
				<input type='hidden' name='_token' value='{{ csrf_token() }}' />
				@if (session('error'))
					<div class='alert alert-danger'>
						@foreach(session('error') as $err)
							<p>{{ $err }}</p>
						@endforeach
					</div>
				@endif
				<!-- cath -->
				<div class='form-group'>
					<div class="input-group" style="width: auto;">
						<label for='fname' class="input-group-addon">
							<img class='' src='/assets/icons/addon-user.png' />
						</label>
						<input autocomplete="off" type='text' required name='first_name' id='fname' class='form-control text-center' placeholder="{!! trans('auth.fname') !!}" />
					</div>
				</div>
				<div class='form-group'>
					<div class="input-group" style="width: auto;">
						<label for='lname' class="input-group-addon">
							<img class='' src='/assets/icons/addon-user.png' />
						</label>
						<input autocomplete="off" type='text' required name='last_name' id='lname' class='form-control text-center' placeholder="{!! trans('auth.lname') !!}" />
					</div>
				</div>
				<!-- cath -->
				<div class='form-group'>
					<div class="input-group" style="width: auto;">
						<label for='username' class="input-group-addon">
							<img class='' src='/assets/icons/addon-user.png' />
						</label>
						<input autocomplete="off" data-auth-rule='min:6|max:10|unique:users,username' data-auth-url='/auth/checkUsername' type='text' required name='username' id='username' class='form-control text-center' placeholder="{!! trans('auth.username') !!}" />
					</div>
				</div>
				<div class='form-group'>
					<div class="input-group">

						<label for='password' class="input-group-addon">
							<img class='' src='/assets/icons/addon-lock.png' />
						</label>
						<input autocomplete="off" pattern="^[0-9a-zA-Z]{8,}$" type='password' required name='password' id='password' class='form-control text-center' placeholder="{!! trans('auth.password') !!}" />

					</div>
				</div>
				<div class='form-group'>
					<div class="input-group">
						<label for='confirm_password' class="input-group-addon">
							<img class='' src='/assets/icons/addon-lock.png' />
						</label>
						<input autocomplete="off" pattern="^[0-9a-zA-Z]{8,}$" type='password' required name='password_confirmation' id='confirm_password' class='form-control text-center' placeholder="{!! trans('auth.confirm_pass') !!}" />
					</div>
				</div>
				<div class='form-group'>
					<div class="input-group">
						<label for='email' class="input-group-addon">
							<img class='' src='/assets/icons/addon-email.png' />
						</label>
						<input autocomplete="off" type='text' required name='email' id='email' class='form-control text-center' placeholder="{!! trans('auth.email') !!}" />
					</div>
				</div>
				<div class='form-group'>
					<div class="input-group scrollable-dropdown-menu" id="zip_code_typeahead">
						<label for='zip_code' class="input-group-addon">
							<img class='' src='/assets/icons/addon-zip-code.png' />
						</label>
						<input type="text" maxlength="5" placeholder="{!! trans('auth.zip_code') !!}" id="zip_code" class="form-control text-center" autocomplete="off">
						<input type="hidden" name="address[city]">
						<input type="hidden" name="address[county]">
						<input type="hidden" name="address[state]">
						<input type="hidden" name="address[location_id]">
					</div>
				</div>
				<hr />
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">{!! trans('auth.purpose') !!}</h4>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12 purposes-col text-left">
								<div class="form-group">
									<label for="purpose1">
										<input id="purpose1" value="1" checked type="radio" class="control-label" name="role">
										{!! trans('auth.looking-for') !!}
									</label>
								</div>
								<div class="form-group">
									<label for="purpose2">
										<input id="purpose2" value="2" type="radio" class="control-label" name="role">
										{!! trans('auth.health-pro') !!}
									</label>
								</div>
								<!-- <div class="form-group">
									<label for="purpose4">
										<input id="purpose4" value="4" type="radio" class="control-label" name="role">
										Clinician
									</label>
								</div> -->
								<div class="form-group">
									<label for="purpose3">
										<input id="purpose3" value="3" type="radio" class="control-label" name="role">
										{!! trans('auth.agent') !!}
									</label>
								</div>
								<div class="row provider-form">
									<div class="col-md-10 col-md-offset-1">
										<label>Sub-role</label>
										
										<div class="form-group">
											<input type="radio" name="sub_role" value="1"/>
											<label> Physician (Private) </label>
										</div>
										<!-- <div class="form-group">
											<input type="radio" name="sub_role" value="2"/>
											<label> Physician (Public) </label>
										</div> -->
										<div class="form-group">
											<input type="radio" name="sub_role" value="3"/>
											<label> Physician (Hospital) </label>
										</div>
										<div class="form-group">
											<input type="radio" name="sub_role" value="4"/>
											<label> Nurse</label>
										</div>
										<div class="form-group">
											<input type="radio" name="sub_role" value="5"/>
											<label> Clinic Staff</label>
										</div>
										<div class="form-group">
											<input type="radio" name="sub_role" value="6"/>
											<label> Hospital Staff</label>
										</div>
										<div class="form-group">
											<input type="radio" name="sub_role" value="7"/>
											<label> Facility</label>
										</div>

										
									</div>
								</div>

								<div class="row agent-form">
									<div class="col-md-10 col-md-offset-1">
										
										<div class="form-group">
											<label>Contact Number</label>
											<input type="text" name="contact" class="form-control text-center numberOnly"/>
										</div>

										<div class="form-group">
											<label>{!! trans('auth.license') !!}</label>
											<input type="text" name="license_number" class="form-control text-center"/>
										</div>

										<div class="form-group">
											<label>Job Title</label>
											<input type="text" name="job_title" class="form-control text-center"/>
										</div>

										<div class="form-group">
											<label>Affiliation</label>
											<input type="text" name="affiliation" class="form-control text-center"/>
										</div>

										<!-- <div class="form-group">
											<label>{!! trans('auth.company') !!}</label>
											<input type="text" name="company" class="form-control text-center"/>
										</div> -->
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
				<hr />
				<div class="form-group text-left">
					<label for="agree">
						<input type="checkbox" name="agree" id="agree"> {!! trans('auth.agree') !!} <a href="/terms" target="_blank">{!! trans('auth.terms-conditions') !!}</a>
					</label>
				</div>
				<button class='btn btn-block btn-submit' type='submit' id='btnSignUp'>{!! trans('auth.sign-up') !!}</button>
			</form>
		</div>
	</div>
@endsection

@section('scripts')
	<script src='/assets/js/vendor/typeahead/typeahead.bundle.min.js'></script>
	<script src='/assets/js/datum/locations.js'></script>
	<script src='/assets/js/auth.js'></script>
	<script>
	auth.init();
	$(function() {
		$('[type=password]').popover({
			'title' : 'Your password must have',
			'content': '<ul class="text-left">'+
										'<li>8 characters minimum length</li>'+
										'<li>1 letter in Upper Case</li>'+
										'<li>1 numeral (0-9)</li>'+
									'</ul>',
			'placement': 'top',
			'delay': {
				'show': 1000,
				'hide' : 0,
			},
			'html' : true,
			'trigger' :'focus'
		});
	});
	</script>
	<script src="/assets/js/sidebar.js"></script>
	<script type="text/javascript">
		sidebar.init();
	</script>
@endsection
