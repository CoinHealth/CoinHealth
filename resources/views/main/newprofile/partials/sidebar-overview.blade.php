  <label for="avatar"></label>
  <div class="upload-avatar upload-photo" style="background-image: url({{ $user->avatar_path }});"></div>
  <div class="name">
    <p class="name">
      <a href="#" class="btn btn-link">{{ $user->fullname }}</a>
    </p>
    <p class="username">
      {{ $user->display_name }}
    </p>
  </div>
  <div class="status">
    @if( $user->full_address )
    <p class="address">
      <i class="fa fa-map-marker" aria-hidden="true"></i> <span>{{ $user->full_address }}</span>
    </p>
    @endif
    <p class="email">
      <i class="fa fa-envelope-o" aria-hidden="true"></i> <span>{{ $user->email }}</span>
    </p>

    <p class="time">
      <i class="fa fa-clock-o" aria-hidden="true"></i> Joined on <span>{{ $user->created_at->format('F d, Y') }}</span>
    </p>
    @if ( $user->purpose == 3 )
    <p>
      <a href="https://agents.careparrot.com" role="button" target="_blank" class="btn btn-orange btn-block btn-xs btn-agent-portal">{!! trans('profile.sidebar.portal') !!}</a>
    </p>
    @elseif ($user->purpose == 2 && $user->profession)
    <p class="profession bg-info">
      <i class="fa fa-user-md" aria-hidden="true"></i> <span>{{ $user->profession }}</span>
    </p>
    @endif
  </div>
  <div class="ffc">
    <div class="col-md-4">
      <p class="followers">
        <span class="number">{{ $user->followers()->count() }}</span><br><span>{!! trans('profile.sidebar.followers') !!}</span>
      </p>
    </div>
    <div class="col-md-4">
      <p class="following">
        <span class="number">{{ $user->following()->count() }}</span><br><span>{!! trans('profile.sidebar.following') !!}</span>
      </p>
    </div>
    <div class="col-md-4">
      <p class="cp-points">
        <span class="number">{{ $user->badges()->sum('progress') }}</span><br><span>{!! trans('profile.sidebar.points') !!}</span>
      </p>
    </div>
  </div>
  <div class="clear"></div>
  <!-- @if ( $user->badges()->count() )
  <div class="badge-container">
    <p class="p-badge">Badges</p>
    <div class="row">
      @foreach( $user->badges as $badge)
      <div class="col-md-3">
        <div class="div-badge">
          <img src="{{ $badge->icon_path }}" alt="">
        </div>
      </div>
      @endforeach
    </div>
  </div>
  @endif -->
<!--   <input type="hidden" name="userID" value="{{ $user->id }}">
  <div class="follow">
    <button type="submit" class="btn btn-warning" id="btnFollow" data-enable="{{ isset($enable) ? $enable : '' }}">
      <i class="fa fa-plus" aria-hidden="true"></i> Follow
    </button>
  </div>
  <div class="thanks">
    <button type="submit" class="btn btn-warning">
      <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Appreciate
    </button>
  </div> -->

 <input type="hidden" name="userID" value="{{ $user->id }}">
  <p class="follow" id="btnFollow" data-enable="{{ isset($enable) ? $enable : '' }}">
    <a role="button" class="btn-orange btn-block btn-sm" ><i class="fa fa-plus text-left" aria-hidden="true"></i> {!! trans('profile.sidebar.follow') !!}</a>
  </p>

  <p class="thanks">
    <a role="button" class="btn-orange btn-block btn-sm"><i class="fa fa-thumbs-o-up text-left" aria-hidden="true"></i> {!! trans('profile.sidebar.appreciate') !!}</a>
  </p>

 <!--  <p class="cp-points">
    <a role="button" class="btn-orange btn-block btn-sm"><i class="fa fa-thumbs-o-up text-left" aria-hidden="true"></i> Appreciate</a>
  </p> -->
