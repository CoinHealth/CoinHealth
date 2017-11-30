@extends('main.newprofile.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/newprofile.css">
<link rel="stylesheet" href="/assets/css/dropzone.min.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
{{-- badge --}}
<link rel="stylesheet" type="text/css" href="/assets/css/vendor/badge/dialog.css">
<link rel="stylesheet" type="text/css" href="/assets/css/vendor/badge/dialog-jim.css">
<link rel="stylesheet" type="text/css" href="/assets/css/badge.css">
{{-- badge --}}
@endsection

@section('content.inner')
  <div class="modal fade follow-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <p><span class="follow-message"></span> {{ $user->full_name }}.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <div class='row desktop-row'>
    <div class="profile-container">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            @include('main.newprofile.partials.sidebar-overview')
          </div>
          <div class="col-md-9">
            <div class="pull-right">
              <div class="logout">
                <a href="/profile">
                  {!! trans('profile.overview.my_profile') !!}
                </a>
              </div>
            </div>
            <ul class="nav nav-tabs" id="myTab">
              <li class="active"><a data-target="#documents" data-toggle="tab">{!! trans('profile.overview.overview') !!}</a></li>
              <li><a data-target="#points" data-toggle="tab">{!! trans('profile.overview.cp_points') !!}</a></li>
            </ul>

            <div class="tab-content">
              <div class="tab-pane active" id="documents">
                <div class="row row-documents">
                  <div class="col-md-6">
                    <div class="about-title">
                      <p>
                        {!! trans('profile.overview.about') !!}
                      </p>
                    </div>
                    <div class="about-content">
                      <p>
                      {{ $user->about!= '' ? $user->about : trans('profile.overview.nothing') }}
                      </p>
                    </div>
                  </div>
                  <div class="col-md-6">

                    <div class="badge-title">
                      <p>
                        {!! trans('profile.overview.badges_earned') !!}
                      </p>
                       @foreach( $user->badges as $badge)
                      <div class="col-md-3">
                        <div class="div-badge"  title="{{ $badge->name }}">
                          <div class="badgeLevel">{{ $badge->pivot->level }}</div>
                          <img src="{{ $badge->icon }}" data-toggle="tooltip" title="{{ $badge->description }}" data-placement="right">
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="points">
                <div class="row row-documents">
                  <div class="col-md-6">
                    <div class="about-title">
                      <p>{!! trans('profile.overview.points') !!}</p>
                    </div>
                   @foreach( $user->badges as $badge)
                   {{--*/ $points = $user->badges()->find($badge->id)->pivot->progress /*--}}
                    <div class="points-badges point">
                      <p>
                        <span>{{ $user->fname }}</span> was rewarded a {{ $badge->name }} Badge and earned {{ $points }} {{ $points== "1" ? 'point' : 'points' }}.
                      </p>
                    </div>
                   @endforeach
                   @foreach( $user->followers as $follower)
                    <div class="points-followers point">
                      <p>
                        <span>{{ $follower->fullname }}</span> followed <span>{{ $user->fname }}</span> on {{ date('F d, Y', strtotime($follower->updated_at)) }}.
                      </p>
                    </div>
                   @endforeach
                    @foreach( $user->appreciates as $appreciate)
                    <div class="points-appreciations point">
                      <p>
                        <span>{{ $appreciate->fullname }}</span> gives appreciation to <span>{{ $user->fname }}</span> on {{ date('F d, Y', strtotime($appreciate->updated_at)) }}.
                      </p>
                    </div>
                   @endforeach
                  </div>
                  <div class="col-md-6">
                    <div class="row">

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mobile-row">
  	<ul class="nav nav-tabs" id="myTabmobile">
      <li class="active">
        <a data-target="#mobiledocuments" data-toggle="tab">
          <img src="/assets/icons/folder.png" alt=""><br>
          <span>{!! trans('profile.overview.overview') !!}</span>
        </a>
      </li>
      <li>
        <a data-target="#mobileactivity" data-toggle="tab" href="#activity">
          <img src="/assets/icons/ok.png" alt=""><br>
          <span>{!! trans('profile.overview.cp_points') !!}</span>
        </a>
      </li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane active" id="mobiledocuments">
        <div class="row">
          <div class="logomobile">
            <img src="/assets/icons/mobile-logo.png" alt="">
          </div>
          <div class="name">
            <p class="name">
              {{ $user->fullname }}
            </p>
            <p class="state">
              {{ $user->full_address }}
            </p>
            @if ( $user->purpose == 3 )
            <p>
              <a href="http://agents.careparrot.com" role="button" target="_blank" class="btn btn-orange btn-block btn-xs btn-agent-portal">AGENT PORTAL</a>
            </p>
            @elseif ($user->purpose == 2 && $user->profession)
            <p class="profession bg-info">
              <i class="fa fa-user-md" aria-hidden="true"></i> <span>{{ $user->profession }}</span>
            </p>
            @endif
          </div>
          <div class="pull-right">
            <div class="logout">
                <a href="/profile">
                  {!! trans('profile.overview.my_profile') !!}
                </a>
              </div>
          </div>
        </div>

        <div class="row upload-image upload-avatar">
          <a href="#">
            <img src="{{ $user->avatar_path }}" alt="" class="img-circle">
          </a>
        </div>
        <div class="follow" data-enable="{{ isset($enable) ? $enable : '' }}">
          <a href="#">
            <i class="fa fa-plus" aria-hidden="true"></i> {!! trans('profile.sidebar.follow') !!}
          </a>
        </div>
        <p class="thanks">
          <a role="button" class="btn-orange btn-block btn-sm"><i class="fa fa-thumbs-o-up text-left" aria-hidden="true"></i> {!! trans('profile.sidebar.appreciate') !!}</a>
        </p>
        <div class="sc-container">
          <div class="row">
            <div class="col-sm-4 col-xs-4">
              <div class="status-box">
                <p class="s-number">{{ $user->followers()->count() }}</p>
                <p class="s-cat">{!! trans('profile.sidebar.followers') !!}</p>
              </div>
            </div>
            <div class="col-sm-4 col-xs-4 sc-middle">
              <div class="status-box">
                <p class="s-number">{{ $user->following()->count() }}</p>
                <p class="s-cat">{!! trans('profile.sidebar.following') !!}</p>
              </div>
            </div>
            <div class="col-sm-4 col-xs-4">
              <div class="status-box">
                <p class="s-number">{{ $user->badges()->sum('progress') }}</p>
                <p class="s-cat">{!! trans('profile.sidebar.points') !!}</p>
              </div>
            </div>
          </div>
        </div>

        <div class="viewing-container mobile-container-msg">
          <div class="container">
            <div class="about-title">
              <p>
                {!! trans('profile.overview.about') !!}
              </p>
            </div>
            <div class="about-content">
              <p>
                 {{ $user->about!= '' ? $user->about : trans('profile.overview.nothing') }}
              </p>
            </div>
            <div class="about-title">
              <p>
                {!! trans('profile.overview.location') !!}
              </p>
            </div>
            <p class="location">
              {{ $user->full_address }}
            </p>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="mobileactivity">
        <div class="row">
          <div class="logomobile">
            <img src="/assets/icons/mobile-logo.png" alt="">
          </div>
          <div class="name">
            <p class="name">
              {{ $user->fullname }}
            </p>
            <p class="state">
              {{ $user->full_address }}
            </p>
            @if ( $user->purpose == 3 )
            <p>
              <a href="http://agents.careparrot.com" role="button" target="_blank" class="btn btn-orange btn-block btn-xs btn-agent-portal">{!! trans('profile.sidebar.portal') !!}</a>
            </p>
            @elseif ($user->purpose == 2 && $user->profession)
            <p class="profession bg-info">
              <i class="fa fa-user-md" aria-hidden="true"></i> <span>{{ $user->profession }}</span>
            </p>
            @endif
          </div>
          <div class="pull-right">
            <div class="logout">
                <a href="/profile">
                  {!! trans('profile.overview.my_profile') !!}
                </a>
              </div>
          </div>
        </div>

        <div class="row upload-image upload-avatar">
          <a href="#">
            <img src="{{ $user->avatar_path }}" alt="" class="img-circle">
          </a>
        </div>
        <div class="follow" data-enable="{{ isset($enable) ? $enable : '' }}">
          <a href="#">
            <i class="fa fa-plus" aria-hidden="true"></i> {!! trans('profile.sidebar.follow') !!}
          </a>
        </div>
        <div class="sc-container">
          <div class="row">
            <div class="col-sm-4 col-xs-4">
              <div class="status-box">
                <p class="s-number">{{ $user->followers()->count() }}</p>
                <p class="s-cat">{!! trans('profile.sidebar.followers') !!}</p>
              </div>
            </div>
            <div class="col-sm-4 col-xs-4 sc-middle">
              <div class="status-box">
                <p class="s-number">{{ $user->following()->count() }}</p>
                <p class="s-cat">{!! trans('profile.sidebar.following') !!}</p>
              </div>
            </div>
            <div class="col-sm-4 col-xs-4">
              <div class="status-box">
                <p class="s-number">{{ $user->badges()->sum('progress') }}</p>
                <p class="s-cat">{!! trans('profile.sidebar.points') !!}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row-panel-activity">
          <div class="container">
            <div class="badge-title">
              <p>
                {!! trans('profile.overview.badges') !!}
              </p>
               @foreach( $user->badges as $badge)
              <div class="col-sm-4 col-md-4 col-xs-4">
                <div class="badge-div" title="{{ $badge->name }}">
                  <img src="{{ $badge->icon }}" data-toggle="tooltip" title="{{ $badge->description }}" data-placement="right" alt="">
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <input type="hidden" class="badge" value="{{ session()->get('Badge') }}" id="Badge">
  <input type="hidden" class="badge" value="{{ session()->get('LeveledUp') }}" id="LeveledUp">
  <input type="hidden" class="badge" value="{{ session()->get('BadgeIcon') }}" id="badgeIcon">
  @include('main.partials.badge')
  @include('main.newprofile.partials.overview-modal')
@endsection

@section('scripts')
	<script type="text/javascript" src="/assets/js/modernizr.custom.js"></script>
	<script type="text/javascript" src="/assets/js/jquery.dlmenu.js"></script>
	<script type="text/javascript" src="/assets/js/Chart.bundle.js"></script>
	<script type="text/javascript" src="/assets/js/profile.js"></script>
	<script type="text/javascript" src="/assets/js/dropzone.min.js"></script>
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
  <script src="/assets/js/overview.js"></script>
  <script type="text/javascript">
    overview.init();
  </script>
@endsection
