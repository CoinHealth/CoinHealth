<div class="reply-list talk-bubble {{ $reply->position_class }}">
  <p class="reply-user {{ $reply->position_class }}">
    {{ $reply->user->full_name }}
  </p>
  <img src="{{ $reply->user->avatar_path }}" alt="" class="img-responsive img-avatar {{ $reply->position_class }}">
  <div class="talktext tri-right {{ $reply->css_class }}">
    <p>{{ $reply->message }}</p>
    <div class="reply-attachments-container">
      @foreach($reply->attachments as $attachment)
        @include('main.newprofile.partials.templates.reply-attachment')
      @endforeach
    </div>
    <p class="small reply-timestamp">{{ $reply->created_at->diffForHumans() }}</p>
  </div>
</div>
