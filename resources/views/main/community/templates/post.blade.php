<div class="post-box post-wrapper" data-id="{{ !isset($post) ?'':$post->id }}">
    <div class="media text-media">
        <div class="media-left">
            <img class="media-object post-img" data-timeline-user-avatar src="{{ !isset($post)?:$post->user->avatar_path }}">
        </div>
        <div class="media-body">
            <a href="{{ !isset($post) ? '': '/profile/overview/'.$post->user->id }}" class="name" data-timeline-user-fullname>{{ !isset($post) ?'':$post->user->full_name }}</a>
            <p class="date" data-timeline-createdat>{{ !isset($post) ?'':$post->time }}</p>
        </div>
    </div>
    <p class="post-p" data-timeline-description>{{ !isset($post) ?'':$post->description  }}</p>
    <div class="attachments-container">
        @if (isset($post))
            @foreach($post->attachments as $attachment)
                @include('main.community.templates.attachments')
            @endforeach
        @endif
    </div>
    <div class="div-button row">
        <div class="col-md-12">
            <div class="pull-left">
                <a href="javascript:void(0);" class="btn-status  {{ auth()->check() ?'':'disabled' }}" data-timeline-btn-upvote="true">
                    <span class="count upvotes">{{ !isset($post) ? 0:$post->upvotes()->count() }}</span>
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-thumbs-o-up fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
                <a href="javascript:void(0);" class="btn-status {{ auth()->check() ?'':'disabled' }}" data-timeline-btn-upvote="false">
                    <span class="count downvotes">{{ !isset($post) ? 0:$post->downvotes()->count() }}</span>
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-thumbs-o-down fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
                <a href="javascript:void(0);" class="btn-status" style="display:none;" data-timeline-btn-reply>
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-share fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
            </div>
            <div class="pull-right view-all">
                <span class="count ">{{ isset($post) && $post->replies()->count() ? $post->replies()->count(): ''}}</span>
                <a href="javascript:void(0);"  data-timeline-btn-view-comment class="btn-view">{{ isset($post) && $post->replies()->count() ? str_plural('Comment', $post->replies()->count()) : 'Comment'}}</a>
            </div>
        </div>
    </div>

    <div class="reply-container" style="display: none;">
        <div class="row">
            <div class="col-md-12">
                <form data-timeline-reply-form action="{{ !isset($post) ?'': "/timeline/{$post->id}/reply" }}" method="post">
                    <div class="form-group">
                        <div class="input-group input-group-sm">
                            <input type="text" name="message" placeholder="write a comment" class="form-control">
                            <input type="hidden" name="timeline_id" value="{{ !isset($post) ?'':$post->id }}">
                            <span class="input-group-addon hidden">
                                <a href="#" data-timeline-reply class=" {{ auth()->check() ?'':'disabled' }}">
                                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="reply-list timeline-replies-container" style="display: none;">
        @if (isset($post))
            @foreach($post->replies as $reply)
                @include('main.community.templates.reply')
            @endforeach
        @endif
    </div>

</div>
