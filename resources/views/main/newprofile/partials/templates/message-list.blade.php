<div class="message-list">
  <a href="/profile/messages/{{ $_thread->hashed_id }}">
    <div>
      <img src="{{ $_thread->otherCollaborators->first()->avatar_path }}" alt="{{ $_thread->user->full_name }}" class="img-responsive message-avatar">
      <p class="message-user">
        @foreach($_thread->otherCollaborators as $collaborator)
        <span class="message-collaborator">{{ $collaborator->full_name }}</span>
        @endforeach
      </p>
      <p class="small pull-right message-timestamp">{{ $_thread->replies->first()->created_at->diffForHumans() }}</p>
      <p class="message-subject">{{ $_thread->subject }}</p>
      <p class="message-last-reply">{{ $_thread->replies->last()->message }}</p>
    </div>
  </a>
</div>
