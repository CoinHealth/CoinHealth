@extends('main.partials.base')

@section('styles')
	{{-- badge --}}
  <link rel="stylesheet" type="text/css" href="/assets/css/vendor/badge/dialog.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/vendor/badge/dialog-jim.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/badge.css">
	{{-- badge --}}
	<link rel='stylesheet' href='/assets/css/landing.css' />
	<link rel="stylesheet" type="text/css" href="/assets/css/vendor/jquery-fullPage/jquery.fullpage.min.css" />
@endsection

@section('content')
@include('main.landing.partials.header')
<div class="footer-wrapper-show" style="display: none;">
	<a href="#" class="show-footer">Get your Free Quote.</a>
</div>
{{-- @include('main.landing.partials.footer') --}}
@include('main.landing.partials.sidebar')
@include('main.partials.zoom')
@include('main.partials.badge')
@include('main.landing.partials.modal-languages')
@if (auth()->check() && !$user->prevent_modal)
	@include('main.partials.modal-premium-apply')
@endif
<div id='main' class="row">
	<input type="hidden" class="badge" value="{{ session()->get('Badge') }}" id="Badge">
	<input type="hidden" class="badge" value="{{ session()->get('LeveledUp') }}" id="LeveledUp">
	<input type="hidden" class="badge" value="{{ session()->get('BadgeIcon') }}" id="badgeIcon">
	<div class='section' id='section0'>
		<div class="wrapper">

			<div class="content">
				<div class="col-md-10 col-md-push-2 inner text-center">
					@if (auth()->check())
						<h4 class="landing-hello">{!! trans('landing.hello') !!} <span class="text-capitalize">{{ auth()->user()->fname ? auth()->user()->fname : auth()->user()->username }}</span>!</h4>
					@endif
					<h1 class="find">{!! trans('landing.affordable') !!} <span>{!! trans('landing.affordable_minutes') !!}</span></h1>
					<form method="get" action="/zip_code" class="zip">

						<div class="pill-zip">
              @if (session()->has('error'))
              <p class='has-error'>{!! trans('landing.invalid') !!} </p>
              @endif
							<button type="submit">{!! trans('landing.tablet') !!}</button>
							<input maxlength="5" name="zip_code" required autocomplete="off" value="{{ is_null($user) ? '' : $user->zip_code }}" type="text" placeholder="{!! trans('landing.zip_code') !!}">
						</div>
					</form>
					<div class="col-md-10 col-md-push-1">
						<h1 class="find find1">{!! trans('landing.wings1') !!}</h1>
						<h1 class="find find2">{!! trans('landing.wings2') !!}</h1>
						<p>
							@if (!auth()->check())
							<a href="/auth/register" class="text-link-2">{!! trans('landing.tour') !!}</a><br>
							@endif
							<a class="change-locale" id="select_lang">{!! trans('landing.lang') !!}</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class='section' id='section1'>
		<div class="div-row-one">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="skew-upper-div">
							<p class="upper-text-small">
								{!! trans('landing.healthcare1') !!} <br>
								<span class="upper-text-big">
                  {!! trans('landing.healthcare2') !!}
                </span>
                <br>
                <span class="upper-text-big">
                  {!! trans('landing.healthcare3') !!}
                </span>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="div-row-two">
			<div class="container">
				<div class="row">
					<div class="col-md-5 slide2-contents">
						<div class="last-div-title">
							<p>{!! trans('landing.about') !!}</p>
						</div>
						<p class="content">
						  {!! trans('landing.live-better') !!}
						</p>
						<p class="content">
							{!! trans('landing.recommend') !!}
						</p>
						<p class="content">
							{!! trans('landing.unique-kind') !!}
							<br>
							<a href="/about" target="_blank" class="learn-more">{!! trans('landing.learn-more') !!}</a>
						</p>
						<div class="row mg-top-20">
							<div class="col-md-12 pad-lt-40">
								<div class="col-md-5 col-lg-4 col-sm-6">
									<a href="/auth/register" class="btn-quote pull-left">{!! trans('landing.join-now') !!}</a>
								</div>
								<div class="col-md-6 col-lg-5 col-sm-6">
									<a href="/quote" class="btn-quote pull-right">{!! trans('landing.get-quote') !!}</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-7">
						<div class="col-md-offset-4 col-md-8">
							<div class="div-btn">
								<a href="/careconnect" class="btn-last">{!! trans('landing.careconnect') !!}</a><br>
								<a href="/community/" class="btn-last btn-nocase">{!! trans('landing.care-community') !!}</a><br>
								<a href="/quote" class="btn-last">{!! trans('landing.find-plans-now') !!}</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  <div class='section' id='section3'>
		<div class='wrapper'>
			<div class="content">
				<p class="move-r-2">{!! trans('landing.health-ctrl') !!}</p>
				<p class="jumbo"><span>{!! trans('landing.any1') !!}</span> <span>{!! trans('landing.any2') !!}</span> <span>{!! trans('landing.any3') !!}</span></p>
				<p class="move-r"><a href="{{ !auth()->check() ? '/auth/register' : '#' }}" class="btn-duit btn btn-success btn-lg">{!! trans('landing.do') !!}</a>  {!! trans('landing.easy1') !!} <span>{!! trans('landing.easy2') !!}</span></p>

        <div class="seal-wrapper">
          <p class="disclaimer text-justify">Attention: This website is operated by CareParrot and is not the Health Insurance Marketplace website. In offering this website, CareParrot is required to comply with all applicable federal laws, including the standards established under 45 CFR 156.220(c) and (d) and standards established under 45 CFR 155.260 to protect the privacy and security of personally identifiable information. This website may not display all data on Qualified Health Plans being offered in your state through the Health Insurance Marketplace website. To see all available data on Qualified Health Plan options in your state, go to the Health Insurance Marketplace website at <a href="healthcare.gov" target="_blank">Healthcare.gov</a>.</p>
          <!-- Begin DigiCert site seal HTML -->
          <div class="center">
          	<div id="DigiCertClickID_6vw19vpF" data-language="en" style="display: inline-block;"></div><img src="assets/icons/hipaa logo.png" alt="" style="display: inline-block; vertical-align: top; margin-left: 10px;">
          </div>
          <!-- End DigiCert site seal HTML -->
        </div>
			</div>
		</div>
	</div>
	<div class='section' id='section4'>
		<div class='wrapper'>
			<div class="content row">
				<div class="center-text">
					<h1 class="text-warning">{!! trans('landing.priority') !!}</h1>
				</div>
				<div class="col-md-7 col-md-push-5 new-slide-container no-pad">
					<div class="pull-right new-slide">
						<div class="row">
							<div class="col-md-12 menu-container">
								<div class="menu-item share-story">
									<p><img src="/assets/icons/quotes/check.png" class="img-responsive" /> {!! trans('landing.share-story') !!}</p>
								</div>
							</div>

							<div class="col-md-12 menu-container">
								<div class="menu-item stay-connected">
									<p><img src="/assets/icons/quotes/check.png" class="img-responsive" /> {!! trans('landing.stay-connected') !!}</p>
								</div>
							</div>

							<div class="col-md-12 menu-container">
								<div class="menu-item be-involved">
									<p><img src="/assets/icons/quotes/check.png" class="img-responsive" /> {!! trans('landing.be-involved') !!}</p>
								</div>
							</div>

							<div class="col-md-12 menu-container">
								<div class="menu-item find-plans">
									<p><img src="/assets/icons/quotes/check.png" class="img-responsive" /> {!! trans('landing.find-plans') !!}</p>
								</div>
							</div>
						</div>
						<p class="text-right">
              @if (!auth()->check())
							<a href="/auth/login" target="_blank" class="link-login">
                {!! trans('landing.login') !!}
              </a>
               {!! trans('landing.or') !!}
               <a href="/auth/register" class="link-register" target="_blank">
                {!! trans('landing.register') !!}
               </a>
              @else
                <a href="/profile" class="link-profile" target="blank">{!! trans('landing.goto-profile') !!}</a>
              @endif
						</p>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class='section' id='section5'>
		<div class='wrapper'>
			<div class="content">
				<div class="row section5-row">
					<div class="col-md-5 col-img text-right">
						<img src="{!! trans('landing.pic-share') !!}" class="share" alt="">
					</div>
					<div class="col-md-2 col-equal">
						<span class="equal">=</span>
					</div>
					<div class="col-md-5 col-img text-left">
						<img src="{!! trans('landing.pic-earn') !!}" class="earn" alt="">
					</div>
				</div>
				<div class="row row-learn">
					<div class="col-md-12">
						<p class="mg-right-80">
							{!! trans('landing.rewarding') !!}
						</p>
						<p class="mg-right-80">
							{!! trans('landing.deserve') !!}
						</p>
						<a href="/community/gameon">
							{!! trans('landing.learn-more-slide5') !!}
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class='section section6' id='section6'>
		<div class='wrapper'>
			<div class="content text-right">

				<h1 class="semi">{!! trans('landing.together1') !!}<br>{!! trans('landing.together2') !!}</h1>
				<a href="/auth/register" class="btn-quote pull-right">{!! trans('landing.join-now-slide6') !!}</a>
        <div class="clearfix"></div>
        <p class="privacy-terms"><a href="/terms/privacy" target="_blank">{!! trans('landing.privacy-terms') !!}.</a></p>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
	@include('partials.badges')
  {{-- badges --}}
  </script>
	{{-- badge --}}
	<script src="/assets/js/vendor/jquery/jquery-ui-1.9.2.min.js"></script>
	<script src='/assets/js/vendor/jquery-fullPage/jquery.fullpage.js'></script>
	<script src='/assets/js/vendor/jquery.fittext.js'></script>
	<script src="https://cdn.jsdelivr.net/scrollreveal.js/3.1.5/scrollreveal.min.js"></script>
	<script>
	$(document).ready(function() {

		$('#select_lang').on('click', function() {
			$('#languagesModal').modal('toggle');
		});
    $('.sidebar-btn').click(function(){
			$(this).toggleClass('open');
		});
    $('.sidebar-btn').on('click', function() {
			if ($('#sidebar').is(':hidden')) {
				$('#sidebar').fadeIn('fast');
			}
			else if ($('#sidebar').is(':visible')) {
				$('#sidebar').hide();
				$('#sidebar').fadeOut('fast');
			}
		});

		// $('#experience').fitText(1.8, { minFontSize: '50px', maxFontSize: '75px' })
		var visible = false;
		$('#main').fullpage({
			// fitToSection: true,
			navigation: true,
			navigationPosition: 'right',
			responsiveWidth: 991,
			scrollBar:true,
			sectionsBackgroundImage: [
				'/assets/icons/landing2.jpg',
				null,// null,
				null,
				// null,
				null,
				null,
				null,
			],
			sectionsColor: [
				null,
				null,
				// null,
				'#043f85',
				'#ffffff',
				'#ff503d',
				'#ff9d27',
			],
			onLeave: function(index, nextIndex, direction){
        console.log(index, nextIndex, direction);
				if (nextIndex >= 2 && nextIndex <= 3) {
					$('#fp-nav ul').addClass('scroller-gray');
				}
				else {
					$('#fp-nav ul').removeClass('scroller-gray');
				}
        // $.fn.fullpage.setResponsive(false);
        // if (nextIndex >= 1 && nextIndex <= 3) {
        //   $.fn.fullpage.setResponsive(true);
        // }
			},
		});

		$('.btn-duit').on('click', function(e) {
			if ($(this).attr('href') == '#') {
				e.preventDefault();
				$.fn.fullpage.moveTo(1);
				$('.show-footer:visible').trigger('click');
			}
		});
		var opacity = 1;
		var lastScrollTop = 0;

		window.sr = ScrollReveal();
		sr.reveal('#section0 .inner', { delay: 700, scale: 0.9, duration: 1200, reset: true });
		sr.reveal('.div-row-two .content', { delay: 500, scale: 0.9, duration: 1200, reset: true  });
		// sr.reveal('#section4', { delay: 200, origin: 'left', duration: 1200,  rotate   : { z: 20 }, reset: true });
		sr.reveal('.share', { delay: 200, origin: 'left', duration: 1200, reset: true  });
		sr.reveal('.earn', { delay: 600, origin: 'right', mobile: true, duration: 1200, reset: true  });
		sr.reveal('.section6 h1.semi', { delay: 600, origin: 'left', mobile: true,  duration: 1200, distance: '500px', reset: true });
		sr.reveal('#section6 .btn-quote', { delay: 900, origin: 'bottom', mobile: true,  duration: 1200, distance: '200px', reset: true });


		var bgImageArray = ["landing2.jpg", "slide1-2.png"];

		var index = 0;
		function swapBG() {
		    $('#section0').css({
		        background: 'url(/assets/icons/'+bgImageArray[index]+') no-repeat center',
		        backgroundSize: 'cover',
		    }, 6000);
		    index++;
		    if (index == bgImageArray.length) {
		        index = 0;
		    }
		    setTimeout(function() {
		        swapBG();
		    }, 6000)
		}
		swapBG();

	});

	</script>
@endsection
