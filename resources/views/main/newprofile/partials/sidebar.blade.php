
  <form action="/profile/avatar" method="post" id="avatar-uploader-form" enctype="multipart/form-data">
    <input type="file" name="avatar" accept="image/*" id="avatar" class="hidden">
    <label for="avatar"></label>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  </form>
  <div class="upload-avatar upload-photo" style="background-image: url({{ auth()->user()->avatar_path }});"></div>
  <div class="name">
    <p class="name">
      <a href="/profile" class="btn btn-link">{{ auth()->user()->fullname }}</a>
    </p>
    <p class="username">
      {{ auth()->user()->display_name }}
    </p>
  </div>
  <div class="status">
    <p class="messages">
      <a href="/profile/messages" role="button" class="btn-orange btn-block btn-sm"><i class="fa fa-inbox text-left" aria-hidden="true"></i> {!! trans('profile.sidebar.messages') !!}</a>
    </p>
    @if( auth()->user()->full_address )
    <p class="address">
      <i class="fa fa-map-marker" aria-hidden="true"></i> <span>{{ auth()->user()->full_address }}</span>
    </p>
    @endif
    <p class="email">
      <i class="fa fa-envelope-o" aria-hidden="true"></i> <span id="email">{{ auth()->user()->email }}</span>
    </p>

    <p class="time">
      <i class="fa fa-clock-o" aria-hidden="true"></i> Joined on <span>{{ auth()->user()->created_at->format('F d, Y') }}</span>
    </p>
    @if ( auth()->user()->purpose == 3 )
    <p>
      <a href="http://agents.careparrot.com" role="button" target="_blank" class="btn btn-orange btn-block btn-xs btn-agent-portal">{!! trans('profile.sidebar.portal') !!}</a>
    </p>
    @elseif (auth()->user()->purpose == 2 && auth()->user()->profession)
    <p class="profession bg-info">
      <i class="fa fa-user-md" aria-hidden="true"></i> <span>{{ auth()->user()->profession }}</span>
    </p>
    @endif
  </div>
  <div class="ffc">
    <div class="col-md-4">
      <p class="followers">
        <span class="number">{{ auth()->user()->followers()->count() }}</span><br>
        <a class="profile-followers">
          <span>{!! trans('profile.sidebar.followers') !!}</span>
        </a>
      </p>
    </div>
    <div class="col-md-4">
      <p class="following">
        <span class="number">{{ auth()->user()->following()->count() }}</span><br>
        <a class="profile-following">
          <span>{!! trans('profile.sidebar.following') !!}</span>
        </a>
      </p>
    </div>
    <div class="col-md-4">
      <p class="cp-points">
        <span class="number">{{ auth()->user()->badges()->sum('progress') }}</span><br>
        <a href="" class="profile-cp-points">
          <span>{!! trans('profile.sidebar.points') !!}</span>
        </a>
      </p>
    </div>
  </div>
  <div class="clear"></div>
  @if ( auth()->user()->badges()->count() )
  <div class="badge-container">
    <p class="p-badge">{!! trans('profile.sidebar.badges') !!}</p>
    <div class="row">
      @foreach( auth()->user()->badges as $badge)
      <div class="col-md-3">
        <div class="div-badge"  title="{{ $badge->name }}">
          <div class="badgeLevel">{{ $badge->pivot->level }}</div>
          <img src="{{ $badge->icon }}" data-toggle="tooltip" title="{{ $badge->description }}" data-placement="right">
        </div>
      </div>
      @endforeach
    </div>
  </div>
  @endif
