<div class="post-wrapper">
  <h5 class="post-user"><a href="/profile/overview/{{ $post->user->username }}">{{ $post->user->full_name }}</a></h5>
  <p class="post-message">
    <span>{{ $post->message }}</span>	&mdash; <small>{{ $post->created_at->diffForHumans() }}</small>
  </p>
  {{-- Paginate Replies --}}
  @if($post->replies()->count())
  <div class="replies-container">
    @foreach($post->replies as $reply)
      <div class="reply-wrapper">
        <h6 class="reply-user"> <a href="/profile/overview/{{ $reply->user->username }}">{{ $reply->user->full_name }}</a></h6>
        <p class="reply-message">{{ $reply->message }} <small>{{ $reply->created_at->diffForHumans() }}</small></p>
      </div>
    @endforeach
  </div>

  @endif
  <div class="reply-container">
    <a href="#" class="btn-link btn-reply">Reply</a>
    <form action="/community/forums/{{ $post->forum_id }}/create" method="post" style="display: none;">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="message_type" value="2">
      <input type="hidden" name="message_id" value="{{ $post->id }}">
      <input type="hidden" name="channel" value="{{ $post->channel }}">
      <input type="hidden" name="uri" value="{{ session('uri') }}">
      <div class="form-group">
        <textarea name="message" id="message" required class="form-control resize-v" placeholder="Write a comment..."></textarea>
      </div>
      <div class="form-group">
        <button type="submit" class="btn pull-right btn-green btn-new-reply btn-xs">SUBMIT</button>
      </div>
    </form>
  </div>
</div>
