<div class="col-md-12 thread-list-wrapper">
  <h4 class="list-title"><a data-toggle="thread" href="/community/forums/general/{{ $topic->id }}/{{ str_slug($topic->title) }}">{{ $topic->title }}</a></h4>
  <p class="list-labels">
    <span class="started-by"><em>Started by: </em><a href="/profile/overview/{{ $topic->user->username }}">{{ $topic->user->full_name }}</a></span>
    <span><em>Date: </em>{{ $topic->created_at->format('F d, Y') }}</span>
    <span>{{ $topic->posts()->comments()->count() }} {{ str_plural('comment', $topic->posts()->comments()->count() ) }}</span>
  </p>
</div>
