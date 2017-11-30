 @include('modals.landing.welcome')
<div class="sidebar-btn" data-toggle="sidebar" data-target="#sidebar">
  <!-- <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span> -->
  <div id="nav-icon3">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
  </div>
</div>

<div id="sidebar" style="display:none;">
  <div class="menu-wrapper" id="sidebar-login">
    <!-- <a href="{{ !auth()->check() ? '/auth/login' : '/profile' }}" target="_blank">
      <p  class="hidden-xs">
        @if (!auth()->check())
          {!! trans('side.log-in') !!}
        @else
          {!! trans('side.my-profile') !!}
        @endif
      </p>
      <img src="/assets/icons/logo.png" class="img-responsive" alt="">
    </a> -->

    <a href="{{ !auth()->check() ? '#welcome' : '/profile' }}" data-toggle="modal">
      <p  class="hidden-xs">
        @if (!auth()->check())
          {!! trans('side.log-in') !!}
        @else
          {!! trans('side.my-profile') !!}
        @endif
      </p>
      <img src="/assets/icons/logo.png" class="img-responsive" alt="">
    </a>

  </div>
  <div class="menu-wrapper" id="sidebar-plans">
    <a href="/find-plans" target="_blank">
      <p  class="hidden-xs">{!! trans('side.plans') !!}</p>
      <img src="/assets/icons/dollar.png" class="img-responsive" alt="">
    </a>
  </div>
  
   {{-- NOTE: removed 7/19/17  --}}
  {{-- <div class="menu-wrapper" id="sidebar-careconnect">
    <a href="/careconnect" target="_blank">
      <p class="hidden-xs">Connect</p>
      <img src="/assets/icons/users-group.png" class="img-responsive" alt="">
    </a>
  </div> --}}
  <div class="menu-wrapper" id="sidebar-share">
    <a href="/community" target="_blank">
      <p  class="hidden-xs">{!! trans('side.share') !!}</p>
      <img src="/assets/icons/landing-fb.png" class="img-responsive" alt="">
      <img src="/assets/icons/landing-instagram.png" class="img-responsive" alt="">
      <img src="/assets/icons/landing-twitter.png" class="img-responsive" alt="">
      <ul class="submenu">
        <li>
          <a href="https://twitter.com/ilovecareparrot" class="twitter-follow-button" data-show-count="false">Follow @ilovecareparrot</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        </li>
        <li>
          <div id="fb-root"></div>
          <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));</script>
          <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
        </li>
      </ul>
    </a>
  </div>
  <div class="menu-wrapper" id="sidebar-about">
    <a href="/about/aboutus" target="_blank">
      <p  class="hidden-xs">{!! trans('side.about') !!}</p>
      <img src="/assets/icons/info.png" class="img-responsive" alt="">
    </a>
  </div>
  <div class="menu-wrapper" id="sidebar-search">
    <a href="/askparrot" target="_blank">
      <p  class="hidden-xs">FAQ</p>
      <img src="/assets/icons/help.png" class="img-responsive" alt="">
    </a>
  </div>
  <div class="menu-wrapper" id="sidebar-contact">
    <a href="/home/contact" target="_blank">
      <p  class="hidden-xs">{!! trans('side.contact-us') !!}</p>
      <img src="/assets/icons/contact.png" class="img-responsive" alt="">
    </a>
  </div>
  <!-- <div class="menu-wrapper" id="sidebar-x">
    <a href="#">
      <p>X</p>
    </a>
  </div> -->
</div>
