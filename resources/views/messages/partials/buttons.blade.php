<button v-if="chat_id"
    :disabled="disableInviteButton"
    type="button"
    ref="btnInvite"
    @click.stop="menuInvite = !menuInvite"
    data-toggle="tooltip"
    title="Invite User to Team"
    class="btn btn-xs btn-default">
    <i class="fa fa-user-plus"></i>
</button>
<button type="button"
    ref="btnNew"
    data-toggle="tooltip"
    @click.stop="menuNew = !menuNew"
    title="Create new Team"
    class="btn btn-xs btn-default">
    <i class="fa fa-users"></i>
</button>
<button type="button"
    @click.stop="attachmentShow"
    ref="btnAttachfile"
    data-toggle="tooltip"
    title="Attach File"
    class="btn btn-xs btn-default">
    <i class="fa fa-file-o"></i>
</button>
<button ref="btnPermission" 
    v-if="isProvider && participantsHasPatient && !isPublic"
    :disabled="false" 
    @click="requestPermission" 
    data-toggle="tooltip"
    title="Request Permission"
    class="btn btn-xs btn-default">
    <i class="fa fa-user-secret"></i>
</button>
<button ref="btnSend"
    :disabled="disableAction"
    @click="send"
    class="pull-right btn btn-xs">
    <i class="fa fa-send"></i> Send
</button>
