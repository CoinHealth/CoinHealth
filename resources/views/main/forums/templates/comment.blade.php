<div class="post-wrapper">
  <h4 class="post-user"><a href=""></a></h4>
  <p class="post-message">
    <span></span>	&mdash; <small></small>
  </p>
  {{-- Paginate Replies --}}
  <div class="replies-container"></div>

  <div class="reply-container">
    <a href="#" class="btn-link btn-reply">Reply</a>
    <form action="" method="post" style="display: none;">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="message_type" value="2">
      <input type="hidden" name="message_id" value="">
      <input type="hidden" name="channel" value="">
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
