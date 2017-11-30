<div class="text-center">
    {{-- <a href="" class="img-profile">
        <img src="{{ $user->avatar_path }}" alt="">
        </a> --}}

        <form action="/profile/avatar" method="post" id="avatar-uploader-form" enctype="multipart/form-data">
            <input type="file" name="avatar" accept="image/*" id="avatar" class="hidden">
            <label for="avatar"></label>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
        <div class="img-profile upload-avatar upload-photo" style="background-image: url({{ $user->avatar_path }});"></div>
    </div>
    <p class="name">
        {{ $user->full_name }}
    </p>
    <p class="status">
        <i class="fa fa-clock-o" aria-hidden="true"></i> <span class="joined">Joined on</span> <span class="date">{{ $user->created_at->format('M d, Y') }}</span>
    </p>

    <div class="prof-btn">

        @if ($view != 'overview')
        <div class="row">
            <div class="col-md-6">
                <a href="/profile" class="btn-yellow {{ $view!='timeline' ?:'active' }}">Public</a>
            </div>
            <div class="col-md-6">
                <a href="/profile/messages" class="btn-yellow {{ $view!='messages' ?:'active' }}">Chat</a>
            </div>
        </div>

        <div class="row mt-10 button-row">
            <div class="col-md-6">
                <a href="/profile/medical" class="btn-yellow ">Medical</a>
            </div>
            <div class="col-md-6">
                <a href="/community" class="btn-yellow">CareCommunity</a>
            </div>
        </div>
        @else
        <div class="row mt-10 button-row">
            <div class="col-md-12">
                <form action="/profile/overview/{{ $user->id }}/{{ $user->isFollowing() ? 'unfollow' : 'follow' }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="followingID" value="{{ $user->id }}">
                    <button type="post" class="btn btn-yellow btn-block">{{ $user->isFollowing() ? 'Unfollow' : 'Follow' }}</button>
                </form>
            </div>
        </div>
        @endif

    </div>

    <div class="row rating">
        <div class="col-md-4 col-sm-4 col-xs-4">
            <p class="rate">
                <span class="num">{{ $user->followers()->count() }}</span>
                <span class="cat">Followers</span>
            </p>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
            <p class="rate">
                <span class="num">{{ $user->following()->count()  }}</span>
                <span class="cat">Following</span>
            </p>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
            <p class="rate">
                <span class="num">{{ $user->badges()->sum('progress') }}</span>
                <span class="cat">CP Points</span>
            </p>
        </div>
    </div>

    <div class="text-center">
        <div class="circle-level level-{{ $user->level ? $user->level->level : 0  }}">
            <p>
                <span class="num">{{ $user->level ? $user->level->level : 0  }}</span>
                <span class="lev">Level</span>
            </p>
        </div>
    </div>
