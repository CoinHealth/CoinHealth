<div class="col-md-9 col-xs-12 thread-content-container thread">
  <div class="thread-header-row">
    <div class="thread-wrapper col-md-12">
      <button type="button" class="close" data-dismiss="thread" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="thread-title">{{ session('topic')->title }}</h4>
      <p class="thread-labels">
        <span class="thread-starter"><em>Started by: </em> <strong>{{ session('topic')->user->full_name }}</strong></span>, 
        <span class="thread-created"><strong>{{ session('topic')->created_at->format('F d, Y') }}</strong></span>
        <br>
        <small>
          <span class="thead-comments"><strong>{{ session('topic')->posts()->count() }} {{ str_plural('comment', session('topic')->posts()->count()) }}</strong></span>
        </small>
      </p>
    </div>

    <div class="post-container col-md-12">
      @foreach(session('comments') as $post)
        @include('main.forums.partials.comment-list')
      @endforeach
    </div>

    @if (session('comments')->hasMorePages())
    <div class="view-more-container col-md-12 text-center">
      <i class="fa fa-spin fa-spinner" style="display:none;"></i>
      <p class="text-center small">
        <a class="view-more-page" href="{{ session('comments')->nextPageUrl() }}">View more comments</a>
      </p>
    </div>
    @endif

    <div class="comment-container col-md-12">
      <form action="/community/forums/{{ session('topic')->id }}/create" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="message_type" value="1">
        <input type="hidden" name="message_id" value="">
        <input type="hidden" name="channel" value="{{ session('topic')->channel }}">
        <input type="hidden" name="uri" value="{{ session('uri') }}">
        <div class="form-group">
          <textarea name="message" id="message" required class="form-control resize-v" placeholder="Write a comment..."></textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="btn pull-right btn-green btn-new-comment btn-xs">SUBMIT</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="comment-template" style="display:none;">
  @include('main.forums.templates.comment')
</div>
<div class="reply-template" style="display:none;">
  @include('main.forums.templates.reply')
</div>
