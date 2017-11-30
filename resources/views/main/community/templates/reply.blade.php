<div class="reply-box">
  <div class="media text-media">
    <div class="media-left">
      <img class="media-object reply-img" data-timeline-reply-user-avatar src="{{ !isset($reply)?:$reply->user->avatar_path }}">
    </div>
    <div class="media-body">
      <a class="name" data-timeline-reply-user-fullname>{{ !isset($reply)?:$reply->user->full_name }}</a>
      <p class="date" data-timeline-reply-createdat>{{  !isset($reply)?:$reply->time }}</p>
      <p class="reply-p" data-timeline-reply-message>{{  !isset($reply)?:$reply->message }}</p>
    </div>
  </div>
</div>
