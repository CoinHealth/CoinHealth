@extends('main.newprofile.base')

@section('styles')
	<link rel="stylesheet" href="/assets/css/sidebar.css">

{{-- badge --}}
<link rel="stylesheet" type="text/css" href="/assets/css/vendor/badge/dialog.css">
<link rel="stylesheet" type="text/css" href="/assets/css/vendor/badge/dialog-jim.css">
<link rel="stylesheet" type="text/css" href="/assets/css/badge.css">
{{-- badge --}}
<link rel="stylesheet" href="/assets/css/profile-settings.css">
<link rel="stylesheet" href="/assets/css/vendor/alertify/alertify.min.css">
<link rel="stylesheet" href="/assets/css/vendor/alertify/themes/bootstrap.min.css"/>
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	@include('main.partials.sidebar')

	<div class="profile-container">
		<input type="hidden" class="badge" value="{{ session()->get('Badge') }}" id="Badge">
		<input type="hidden" class="badge" value="{{ session()->get('LeveledUp') }}" id="LeveledUp">
		<input type="hidden" class="badge" value="{{ session()->get('BadgeIcon') }}" id="badgeIcon">
		<div class="container">
			<div class="row out-2">

				<div class="col-md-12">

					<div class="pull-right">
						<div id="dl-menu" class="dl-menuwrapper">
							<button class="dl-trigger"><i class="fa fa-lg fa-cog" aria-hidden="true"></i><i class="fa fa-caret-down" aria-hidden="true"></i></button>
							<ul class="dl-menu">
								<li>
									<a href="/profile/">{!! trans('profile.menu.menu1') !!}</a>
								</li>
								<li>
									<a href="/profile/life-changing-events">{!! trans('profile.menu.menu2') !!}</a>
								</li>
								<li>
									<a href="/auth/logout">{!! trans('profile.menu.menu3') !!}</a>
								</li>
							</ul>
						</div><!-- /dl-menuwrapper -->
					</div>
					<div class="pull-right mt-15">
							<a href="/profile" class="btn-back-profile">{!! trans('profile.menu.profile') !!}</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					@include('main.newprofile.partials.sidebar')
				</div>
				<div class="col-md-9">
					<div class="out">
						<div class="pull-left mt-15">
							<a href="/profile" class="btn-back-profile">{!! trans('profile.menu.profile') !!}</a>
						</div>
						<div class="pull-right">
							<div id="dl-menu" class="dl-menuwrapper">
								<button class="dl-trigger"><i class="fa fa-lg fa-cog" aria-hidden="true"></i><i class="fa fa-caret-down" aria-hidden="true"></i></button>
								<ul class="dl-menu">
									<li>
										<a href="/profile/">{!! trans('profile.menu.menu1') !!}</a>
									</li>
									<li>
										<a href="/profile/life-changing-events">{!! trans('profile.menu.menu2') !!}</a>
									</li>
									<li>
										<a href="/auth/logout">{!! trans('profile.menu.menu3') !!}</a>
									</li>
								</ul>
							</div><!-- /dl-menuwrapper -->
						</div>
					</div>

					<div class="clear"></div>

					<div class="row row-settings">
						<div class="col-md-12">
							<div class="panel panel-default">
							  	<div class="panel-heading panel-yellow">
							  		{!! trans('profile.settings.settings') !!}
							  	</div>
							  	<div class="panel-body">
							    	<div class="row">
							    		<div class="col-md-8">
							    			<form autocomplete="off">
											  	<div class="form-group">
											    	<label>{!! trans('profile.settings.username') !!}
															{{-- <a href="#" class="cmdBtn">(change)</a> --}}
															<span class="btn-container" style="display:none"></span>
														</label>
											    	<input disabled type="text" data-hash="false" data-restrict="unique|alpha" id="username" autocomplete="off" name="username" value="{{ auth()->user()->username }}" class="form-control input">
											  	</div>
											  	<div class="form-group">
											    	<label>{!! trans('profile.settings.password') !!}
															<a href="#" class="cmdBtn">{!! trans('profile.settings.change') !!}</a>
															<span class="btn-container" style="display:none"></span>
														</label>
											    	<input disabled type="password" data-hash="true" data-restrict="password|min:9" id="password" autocomplete="off" name="password" value="" class="form-control input">
											  	</div>
											  	<div class="form-group">
											    	<label>{!! trans('profile.settings.first_name') !!}
															<a href="#" class="cmdBtn">{!! trans('profile.settings.change') !!}</a>
															<span class="btn-container" style="display:none"></span>
														</label>
											    	<input disabled type="text" data-hash="false" data-restrict="alpha" id="fname" name="fname" value="{{ auth()->user()->fname }}" class="form-control input">
											  	</div>
											  	<div class="form-group">
											    	<label>{!! trans('profile.settings.last_name') !!}
															<a href="#" class="cmdBtn">{!! trans('profile.settings.change') !!}</a>
															<span class="btn-container" style="display:none"></span>
														</label>
											    	<input disabled type="text" data-hash="false" data-restrict="alpha" id="lname" name="lname" value="{{ auth()->user()->lname }}" class="form-control input">
											  	</div>
											  	<div class="form-group">
											    	<label>{!! trans('profile.settings.display_name') !!}
															<a href="#" class="cmdBtn">{!! trans('profile.settings.change') !!}</a>
															<span class="btn-container" style="display:none"></span>
														</label>
											    	<input disabled type="text" data-hash="false" data-restrict="alphanumeric" id="display_name" name="display_name" value="{{ auth()->user()->display_name }}" class="form-control input">
											  	</div>
											  	<div class="form-group">
											    	<label>{!! trans('profile.settings.city_state') !!}
															<a href="#" class="cmdBtn">{!! trans('profile.settings.change') !!}</a>
															<span class="btn-container" style="display:none"></span>
														</label>
											    	<input disabled type="text" data-restrict="alpha" name="location_id" class="form-control input" id="full_address" value="{{ auth()->user()->full_address }}">
											  	</div>
											  	<div class="form-group">
											    	<label>{!! trans('profile.settings.about') !!}
															<a href="#" class="cmdBtn">{!! trans('profile.settings.change') !!}</a>
															<span class="btn-container" style="display:none"></span>
														</label>
											    	<textarea disabled id="about" data-restrict="alphanumeric" name="about" class="form-control input" rows="4">{{ auth()->user()->about }}</textarea>
											  	</div>
													@if ( auth()->user()->purpose == 2 )
													<div class="form-group">
											    	<label>{!! trans('profile.settings.profession') !!}
															<a href="#" class="cmdBtn">{!! trans('profile.settings.change') !!}</a>
															<span class="btn-container" style="display:none"></span>
														</label>
											    	<input disabled type="text" data-restrict="alpha" name="profession" class="form-control input" id="profession" value="{{ auth()->user()->profession }}">
											  	</div>
													@endif
													<div class="form-group">
												  	<label>{!! trans('profile.settings.restrictions') !!}
															<a href="#" class="cmdBtn">{!! trans('profile.settings.change') !!}</a>
															<span class="btn-container" style="display:none"></span>
														</label>
												  	<div class="checkbox">
												  		<div class="form-inline">
													    	<label for="is_public1">
													      		 <input type="radio" class="input" disabled name="is_public" id="is_public1" value="1" {{ auth()->user()->is_public?'checked':'' }} > {!! trans('profile.settings.public') !!}
													    	</label>
													    	<label for="is_public0">
													      		 <input type="radio" class="input" disabled name="is_public" id="is_public0" value="0" {{ auth()->user()->is_public?:'checked' }} > {!! trans('profile.settings.private') !!}
													    	</label>
													    </div>
												  	</div>
													</div>
											  	<div class="form-group">
											    	<label>{!! trans('profile.settings.send_to') !!}
															<a href="#" class="cmdBtn">{!! trans('profile.settings.change') !!}</a>
															<span class="btn-container" style="display:none"></span>
														</label>
											    	<input disabled type="text" data-restrict="alphanumeric" name="email" value="{{ auth()->user()->email }}" id="email" class="form-control input">
											  	</div>
											  	<a href="#" class="btn btn-danger btn-delete-account">{!! trans('profile.settings.delete_account') !!}</a>
											</form>
							    		</div>
							    	</div>
							  	</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@include('main.partials.badge')
	</div>
	<span style="display:none;" class="btn-container-template">
		<span>
			<a href="#" class="btn btn-primary btn-xs btn-save">{!! trans('profile.settings.save') !!}</a>
			<a href="#" class="btn btn-default btn-xs btn-cancel">{!! trans('profile.settings.cancel') !!}</a>
		</span>
	</span>


  @include('main.newprofile.partials.profile-modal')
@endsection

@section('scripts')
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
  sidebar.init();
</script>
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
	<script src="https://use.fontawesome.com/fb77c1567b.js"></script>
	<script type="text/javascript" src="/assets/js/modernizr.custom.js"></script>
	<script type="text/javascript" src="/assets/js/jquery.dlmenu.js"></script>
	<script type="text/javascript" src="/assets/js/profile.js"></script>
	<script type="text/javascript" src="/assets/js/vendor/alertify/alertify.min.js"></script>
	<script type="text/javascript">
	$(function() {
		profile.init();
	});
	</script>
@endsection
