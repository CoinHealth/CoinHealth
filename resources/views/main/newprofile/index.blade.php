@extends('main.newprofile.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/newprofile.css">
<link rel="stylesheet" href="/assets/css/dropzone.min.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
{{-- badge --}}
<link rel="stylesheet" type="text/css" href="/assets/css/vendor/badge/dialog.css">
<link rel="stylesheet" type="text/css" href="/assets/css/vendor/badge/dialog-jim.css">
<link rel="stylesheet" type="text/css" href="/assets/css/badge.css">
<link rel="stylesheet" type="text/css" href="/assets/css/health.css">
{{-- badge --}}
@endsection

@section('content.inner')
  @include('main.partials.sidebar')
  <div class='row desktop-row'>
    @include('main.newprofile.partials.profile-desktop')
  </div>
<!--   <div class="row mobile-row">
    @include('main.newprofile.partials.profile-mobile')
  </div> -->
  @include('main.newprofile.partials.upload-attachment')

  <input type="hidden" class="badge" value="{{ session()->get('Badge') }}" id="Badge">
  <input type="hidden" class="badge" value="{{ session()->get('LeveledUp') }}" id="LeveledUp">
  <input type="hidden" class="badge" value="{{ session()->get('BadgeIcon') }}" id="badgeIcon">
  @include('main.partials.badge')

  @include('main.newprofile.partials.profile-modal')
  @include('main.partials.templates.health-modals')
  <div class="activity-template" style="display:none;">
    @include('main.newprofile.partials.templates.activity')
  </div>
@endsection

@section('scripts')
  <script src="/assets/js/sidebar.js"></script>
  <script type="text/javascript">
  	sidebar.init();
  </script>

  <script src="//js.pusher.com/3.1/pusher.min.js"></script>
  <script>
    var pusher = new Pusher('{{ config("services.pusher.app_key") }}');
  </script>
  <script src="/assets/js/notify.js"></script>
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
  <script type="text/javascript" src="/assets/js/health.js"></script>
  <script type="text/javascript">
    health.initQuestions();
    health.init();
  </script>
  {{-- badge --}}
	<script type="text/javascript" src="/assets/js/modernizr.custom.js"></script>
	<script type="text/javascript" src="/assets/js/jquery.dlmenu.js"></script>
	<script type="text/javascript" src="/assets/js/Chart.bundle.js"></script>
	<script type="text/javascript" src="/assets/js/profile.js"></script>
	<script type="text/javascript" src="/assets/js/dropzone.min.js"></script>
	<script type="text/javascript">
	$(function() {
		Dropzone.autoDiscover = false;
		profile.init();
		profile.initAttachments();
	});
	</script>
	<script type="text/javascript">
		$(".btn-view").click(function () {
			$(".view-doc-row").fadeIn();
			$(".upload-doc-row").fadeOut();
		});

		$(".btn-upload").click(function () {
			$(".upload-doc-row").fadeIn();
			$(".view-doc-row").fadeOut();
		});
	</script>

@endsection
