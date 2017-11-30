<div class="col-md-2 col-sm-2 col-xs-4">
  <div class="text-center follow-list">
    <a href="/profile/overview/{{ $user->id }}">
      <img src="{{ $user->avatar_path }}" class="img-responsive" alt="{{ $user->full_name }}">
      <p class="user-fullname">{{ $user->full_name }}</p>
      <p>{{ $user->isFollowing() ? 'FOLLOWING' : 'FOLLOW' }}</p>
    </a>
  </div>
</div>
