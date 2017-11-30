<div class="row">
  <div class="col-md-12">
    <ul class="menu">
      <li><a href="/community/forums">Forums</a></li>
      @if ( auth()->check() && auth()->user()->isAdmin() )
      <li><a href="https://agents.careparrot.com">Agent Portal</a></li>
      @endif
      <li><a href="/"><i class="fa fa-home" aria-hidden="true"></i></a></li>
      <li><a href="/profile/settings"><i class="fa fa-cog" aria-hidden="true"></i></a></li>
    </ul>
  </div>
</div>
