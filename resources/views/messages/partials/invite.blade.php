<div class="invite-wrapper">
    <div class="input-group">
        <multi-select
            v-model="form.users"
            label="full_name"
            track-by="id"
            placeholder="Invite user"
            :options="users"
            :multiple="true"
            :searchable="true"
            :loading="searchLoading"
            :internal-search="false"
            :clear-on-select="false"
            :close-on-select="false"
            :limit="10"
            aria-describedby="invite-addon"
            @search-change="getUsers">
            <span slot="noResult">
                Oops! No users found. Consider changing the search query.
            </span>
        </multi-select>
        <span class="input-group-addon" id="invite-addon">
            <button type="button"
                :disabled="disableSendInviteButton"
                ref="btnSendInvite"
                @click="sendInvite"
                class="btn btn-info btn-xs">
                <i class="fa fa-check"></i> Send Invite
            </button>
        </span>
    </div>
</div>
