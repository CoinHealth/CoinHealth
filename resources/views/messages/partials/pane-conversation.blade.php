<div
    ref="paneConversation"
    v-show="menuList"
    class="col-md-5 col-xs-10 conversation-container floating floating-left">
    <div class="participants" v-show="chat.conversation.participants.length">
        <p class="header">Participants</p>
        <participant-list class="pane-container"
            :is-owner="isCreator"
            :participants="chat.conversation.participants">
        </participant-list>
    </div>
    <div class="conversations">
        <p class="header">Other Conversations</p>
        <conversation-list class="pane-container"
            :conversations="chat.conversations">
        </conversation-list>
    </div>

</div>
