<div class="media media-reply">
  <div class="media-left">
    <a href="#">
      <img class="media-object" data-timeline-reply-user-avatar src="{{ !isset($reply) ?:$reply->user->avatar_path }}">
    </a>
  </div>
  <div class="media-body">
    <a href="" class="media-heading" data-timeline-reply-user-fullname>{{ !isset($reply) ?:$reply->user->full_name }}</a>
    <div class="row">
      <div class="col-md-10">
        <p data-timeline-reply-message>{{ !isset($reply) ?:$reply->message }}</p>
        <span class="small">&mdash; <span data-timeline-reply-createdat>{{ !isset($reply) ?:$reply->time }}</span></span>
      </div>
    </div>
  </div>
</div>
