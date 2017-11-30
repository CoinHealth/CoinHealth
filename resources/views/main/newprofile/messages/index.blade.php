@extends('main.newprofile.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/newprofile.css">
<link rel="stylesheet" href="/assets/css/messages.css">
<link rel="stylesheet" href="/assets/css/vendor/at/jquery.atwho.min.css">
{{-- badge --}}
<link rel="stylesheet" type="text/css" href="/assets/css/vendor/badge/dialog.css">
<link rel="stylesheet" type="text/css" href="/assets/css/vendor/badge/dialog-jim.css">
<link rel="stylesheet" type="text/css" href="/assets/css/badge.css">
{{-- badge --}}
@endsection

@section('content.inner')
@include('main.partials.sidebar')

<input type="hidden" class="badge" value="{{ session()->get('Badge') }}" id="Badge">
<input type="hidden" class="badge" value="{{ session()->get('LeveledUp') }}" id="LeveledUp">
<input type="hidden" class="badge" value="{{ session()->get('BadgeIcon') }}" id="badgeIcon">
<div class="desktop-row">
  <div class="profile-container">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          @include('main.newprofile.partials.sidebar')
        </div>
        <div class="col-md-9">
          {{--
          <div class="pull-right">
            <a href="/profile/messages" data-toggle="tooltip" class="pull-left refresh" data-title="Hit to Refresh">Click to retrieve new messages <img src="/assets/icons/refresh_button.png" alt=""></a>
          </div> --}}
          <a href="/" class="btn btn-link"><i class="fa fa-home"></i></a>
          <a href="/community/forums" class="btn btn-link">Forums</a>
          <a href="/profile" class="btn btn-link">Profile</a>
          <a href="" class="btn btn-link pull-right"><i class="fa fa-refresh"></i></a>
          <div class="messages-row row" style="">
            <div class="col-md-12">
              <div class="col-md-4 messages-users-wrapper">
                <div class="message-new-wrapper">
                  <div class="pull-left">
                    <div id="dl-menu" class="dl-menuwrapper">
                      <button class="dl-trigger"><i class="fa fa-lg fa-cog" aria-hidden="true"></i><i class="fa fa-caret-down" aria-hidden="true"></i></button>
                      <ul class="dl-menu">
        								<li>
        									<a href="/profile/">Settings</a>
        								</li>
        								<li>
        									<a href="/profile/life-changing-events">Life Changing Events</a>
        								</li>
        								<li>
        									<a href="/auth/logout">Log out</a>
        								</li>
        							</ul>
                    </div>
                  </div>
                  <p class="messages-header">Threads</p>
                  <a href="/profile/messages/new" type="button" class="pull-right btn btn-sm new-thread-btn"><span class="fa fa-plus"></span> New</a>
                </div>
                <div class="message-list-container" id="message-list-container-desktop">
                  @if ($threads->count())
                  @foreach($threads as $_thread)
                    @include('main.newprofile.partials.templates.message-list')
                  @endforeach
                  @endif
                </div>
              </div>
              <div class="col-md-8 messages-body-wrapper">
                @if (isset($base) && $base == 'new')
                  @include('main.newprofile.partials.new-message')
                @else
                  @if ($thread)
                    <div class="messages-container" id="messages-container-desktop">
                    @foreach($thread->replies as $reply)
                      @include('main.newprofile.partials.templates.message-bubble')
                    @endforeach
                    </div>
                    @include('main.newprofile.partials.templates.new-reply')
                  @endif
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="mobile-row">

  <div class="tab-content">
    <div class="tab-pane active" id="mobiledocuments">
      <div class="row">
        <div class="logomobile">
          <img src="/assets/icons/mobile-logo.png" alt="">
        </div>
        <div class="name">
          <p class="name">
            {{ auth()->user()->fullname }}
          </p>
          <p class="state">
            {{ auth()->user()->full_address }}
          </p>
          @if ( auth()->user()->purpose == 3 )
          <p>
            <a href="http://agents.careparrot.com" role="button" target="_blank" class="btn btn-orange btn-block btn-xs btn-agent-portal">AGENT PORTAL</a>
          </p>
          @elseif (auth()->user()->purpose == 2 && auth()->user()->profession)
          <p class="profession bg-info">
            <i class="fa fa-user-md" aria-hidden="true"></i> <span>{{ auth()->user()->profession }}</span>
          </p>
          @endif
        </div>
        <div class="pull-right">
          <div id="dl-menu" class="dl-menuwrapper">
            <button class="dl-trigger"><i class="fa fa-lg fa-cog" aria-hidden="true"></i><i class="fa fa-caret-down" aria-hidden="true"></i></button>
            <ul class="dl-menu">
							<li>
								<a href="/profile/">Settings</a>
							</li>
							<li>
								<a href="/profile/life-changing-events">Life Changing Events</a>
							</li>
							<li>
								<a href="/auth/logout">Log out</a>
							</li>
						</ul>
          </div><!-- /dl-menuwrapper -->
        </div>
      </div>

      <div class="row upload-image">
        <a href="#">
          <img src="{{ auth()->user()->avatar_path }}" alt="" class="img-circle">
        </a>
      </div>
      <div class="sc-container">
        <div class="row">
          <div class="col-sm-4 col-xs-4">
            <div class="status-box">
              <p class="s-number">2,027 Total</p>
              <p class="s-cat">Total Contributions</p>
            </div>
          </div>
          <div class="col-sm-4 col-xs-4 sc-middle">
            <div class="status-box">
              <p class="s-number">162 Days</p>
              <p class="s-cat">Days Active</p>
            </div>
          </div>
          <div class="col-sm-4 col-xs-4">
            <div class="status-box">
              <p class="s-number">13 People</p>
              <p class="s-cat">Referred Users</p>
            </div>
          </div>
        </div>
      </div>

      <div class="viewing-container mobile-container-msg">
        <div class="col-sm-12 col-xs-12">
          <div class="col-md-4 messages-users-wrapper">
            <div class="message-new-wrapper">
              <p calss="messages-header">Threads</p>
              <a href="/profile/messages/new" type="button" class="pull-right btn btn-sm new-thread-btn"><span class="fa fa-plus"></span> New</a>
            </div>
            <div class="message-list-container" id="message-list-container-mobile">
              @foreach($threads as $_thread)
                @include('main.newprofile.partials.templates.message-list')
              @endforeach
            </div>
          </div>
          <div class="col-md-8 messages-body-wrapper">
            @if (isset($base) && $base == 'new')
              @include('main.newprofile.partials.new-message')
            @else
              <div class="messages-container" id="messages-container-mobile">
              @if ($thread)
              @foreach($thread->replies as $reply)
                @include('main.newprofile.partials.templates.message-bubble')
              @endforeach
              </div>
              @include('main.newprofile.partials.templates.new-reply')
              @endif
            @endif
          </div>
        </div>
      </div>
      @include('main.partials.badge')
    </div>
  </div>
</div>
@include('main.newprofile.partials.upload')
@include('main.partials.badge')
@endsection

@section('scripts')
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
  sidebar.init();
</script>
<script type="text/javascript" src="/assets/js/vendor/typeahead/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="/assets/js/modernizr.custom.js"></script>
<script type="text/javascript" src="/assets/js/jquery.dlmenu.js"></script>
<script src="/assets/js/vendor/caretjs/jquery.caret.min.js" type="text/javascript"></script>
<script src="/assets/js/vendor/at/jquery.atwho.min.js" type="text/javascript"></script>
<script src="/assets/js/messages.js"></script>
<script>
  $(function() {
    $('[data-toggle="tooltip"]').tooltip();
    messages.init($('.new-message-wrapper').length);
  });
</script>

@if (isset($base) && $base == 'new')
  <script type="text/javascript" src="/assets/js/datum/members.js"></script>
  <script type="text/javascript" src="/assets/js/member.js"></script>
  <script>
    member.init();
  </script>
@endif

{{-- badge --}}
@include('partials.badges')
{{-- badge --}}
@endsection
