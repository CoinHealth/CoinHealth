<nav class="navbar forum-header navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/community/forums"><i class="fa fa-home"></i></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse text-center">
      <a href="/">
        <img src="/assets/icons/logo.png" alt="" class="navbar-logo">
        <span class="nav-text">CARECOMMUNITY</span>
      </a>

      <div class="pull-right navbar-user-container">
        @if (auth()->check())
        <div class="wrapper-left">
          <p class="navbar-user">{{ auth()->user()->full_name }}</p>
          <p class="navbar-auth"><a href="/auth/logout">log out</a></p>
        </div>
        <img src="{{ auth()->user()->avatar_path }}" alt="" class="avatar-nav">
        @else
        <div class="wrapper-left">
          <p class="navbar-auth"><a href="/auth/login">log in</a></p>
        </div>
        @endif

      </div>
    </div><!--/.nav-collapse -->
  </div>
</nav>
