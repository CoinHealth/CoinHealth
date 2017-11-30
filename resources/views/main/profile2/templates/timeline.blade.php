<div class="row comment-row">
  <div class="col-md-12">
    <div class="media">
      <div class="media-left">
        <a href="/profile">
          <img class="media-object" data-timeline-user-avatar src="{{ !isset($timeline) ?'': $timeline->user->avatar_path }}">
        </a>
      </div>
      <div class="media-body">
        <a href="/profile" class="media-heading" data-timeline-user-fullname>{{ !isset($timeline) ?'':$timeline->user->full_name }}</a>
        <div class="row">
          <div class="col-md-10">
            <p data-timeline-description>{{ !isset($timeline) ?'':$timeline->description }}</p>
            <span class="small">&mdash; <span data-timeline-createdat>{{ !isset($timeline) ?'':$timeline->time }}</span></span>
          </div>
          <div class="col-md-2 com-rep text-right">
            <a href="#" data-timeline-edit="{{ !isset($timeline) ?'':$timeline->id }}">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
            <a href="#" data-timeline-delete="{{ !isset($timeline) ?'':$timeline->id  }}">
              <i class="fa fa-times" aria-hidden="true"></i>
            </a>
          </div>
        </div>

        <div class="timeline-replies-container">
          @if (isset($timeline))
          @foreach($timeline->replies as $reply)
            @include('main.profile2.templates.timeline-reply')
          @endforeach
          @endif
        </div>

        <div class="reply">
          <div class="row">
            <div class="col-md-10">
              <div class="form-inline">
                <form action="{{ !isset($timeline) ?: "/timeline/{$timeline->id}/reply" }}" method="post" data-timeline-reply-form>
                <div class="form-group">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="text" class="form-control" name="message" placeholder="post a reply..">
                  <input type="hidden" name="timeline_id" value="{{ !isset($timeline) ?'':$timeline->id }}">
                  <a href="#" data-timeline-reply class="hidden">
                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                  </a>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="pull-right reply-ab">
        <a class="a-reply">
          <i class="fa fa-reply" aria-hidden="true"></i>
        </a>
        <a href="#" class="arrow-down">
          <i class="fa fa-arrow-down" aria-hidden="true"></i>
        </a>
        <a href="#" class="arrow-up">
          <i class="fa fa-arrow-up" aria-hidden="true"></i>
        </a>
      </div>
    </div>
  </div>
</div>
