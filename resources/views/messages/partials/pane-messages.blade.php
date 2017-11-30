<div ref="paneMessages" class="col-md-12 message-body">
    <div :class="['replies-list', replyListMask]" ref="repliesList">

        <transition-group name="popup"
            v-if="chat.conversation.replies.length">
            @include('messages.partials.replies')
        </transition-group>
        <div v-else
            class="alert alert-warning alert-dismissible"
            role="alert">
            <button type="button"
                class="close"
                data-dismiss="alert"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Whoops!. there seems to be nothing in here, try sending one.
        </div>
    </div>

    <div class="message-action">
        @include('messages.partials.message-action')
    </div>

</div>
