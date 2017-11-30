<template>
    <div class="media reply">
        <div class="media-left">
            <a href="#">
                <img class="media-object message-user-avatar" 
                    :src="reply.user.avatar_path" 
                    alt="...">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading">
                <span class="message-user-name">
                    {{ reply.user.full_name }}
                </span>
                <span class="message-timestamp pull-right">
                    {{ time }}
                </span>
            </h4>
            <p class="message-body small">
                <span v-if="!reply.has_permission">{{ reply.message }}</span>
                <span class="message-permission" v-else>
                    {{ permissionProviderText }} sent a 
                    <strong v-if="!includesInPermission">
                        Permission Request
                    </strong> 
                    <a href="/profile?ref=team-builder#activities" v-else class="btn-link" target="_blank">
                        <strong>
                            Permission Request
                        </strong> 
                    </a> to
                    {{ permissionPatientText }}
                </span>
            </p>
            <div class="message-attachments-container" 
                v-if="reply.attachments.length">
                <attachment :key="attachment.id" 
                    :attachment="attachment"
                    v-for="attachment in reply.attachments">
                </attachment>
            </div>
        </div>
    </div>
</template>
<script>
import ReplyAttachment from './ReplyAttachment.vue';
import TimeAgo from '../../helpers/TimeAgo.vue';
export default {
    components: {
        'attachment': ReplyAttachment,
        'timeago': TimeAgo
    },

    props: {
        reply: {
            type: Object
        }
    },

    computed: {
        time () {
            return this.reply.timeago
        },

        includesInPermission () {
            if (!this.reply.has_permission)
                return false;
            let userId = this.Laravel.userId;
            let permission = this.reply.permission;

            return userId == permission.provider_id || 
                        userId == permission.patient_id;
        },

        permissionPatient () {
            if (this.reply.has_permission) {
                return this.reply.permission.user_patient;
            }
        },

        permissionProvider () {
            if (this.reply.has_permission) {
                return this.reply.permission.user_provider;
            }
        },

        permissionPatientText () {
            if (this.reply.has_permission) {
                return this.permissionPatient.id == Laravel.userId ? 
                    'You' : this.permissionPatient.full_name;
            }
        },

        permissionProviderText () {
            if (this.reply.has_permission) {
                return this.permissionProvider.id == Laravel.userId ? 
                    'You' : this.permissionProvider.full_name;
            }
        },
    }
}
</script>
