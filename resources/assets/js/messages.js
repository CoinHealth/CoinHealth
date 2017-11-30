import axios from 'axios';
import Bus from './Bus.js';
import ReplyList from './components/Messages/ReplyList.vue';
import UploadPreview from './components/Messages/AttachedFilePreview.vue';
import ParticipantList from './components/Messages/Participants/List.vue';
import ConversationList from './components/Messages/Conversations/List.vue';
import MultiSelect from 'vue-multiselect';
import FilePreview from './components/Attachments/File.vue';
import MixinNotification from './Mixins/Notification.js'
import PermissionRequestForm from './components/Permissions/Request.vue';


const Messages = new Vue({
    el: '#messages',
    mixins: [MixinNotification],
    
    components: {
        'reply-list': ReplyList,
        'file-preview': FilePreview,
        'multi-select': MultiSelect,
        'upload-preview': UploadPreview,
        'participant-list': ParticipantList,
        'conversation-list': ConversationList,
        'permission-request-form': PermissionRequestForm,
    },
    data: {
        chat_id: $('#chat_id').val(),
        form: {
            message: '',
            attachments: [],
            inputSearch: '',
            users: [],
        },
        chat: {
            conversation: {
                user: {
                    full_name: '',
                },
                attachments: [],
                participants: [],
                patient: [
                    {
                        url_id: '',
                    }
                ],
                replies: [],
                pivot: {
                    has_joined: false,
                }
            },
            conversations: [],
        },
        menuList: false,
        menuFile: false,
        menuNew: false,
        menuInvite: false,
        pagination: null,
        users: [],
        searchLoading: false,
    },

    mounted () {
        let self = this;
        $('[data-toggle="tooltip"]').tooltip();
        if (self.chat_id) {
            self.prepareBroadcasting();
            self.getChats();
            Bus.$on('toggle-join', self.toggleJoin);
            Bus.$on('participant-remove', self.participantKick);
        }
    },

    methods: {
        prepareBroadcasting () {
            let chat_room = `Chat.${this.chat_id}`;
            let self = this;
            Echo.join(chat_room)
                .listen('Messages.MessageWasSent', (e) => {
                    // if (self.excludeFromBroadcast(eventData.invitee.id)) {
                    //     return;
                    //     // NOTE: this should be done in backend
                    // }
                    self.newMessage(e.reply);
                });

            Echo.channel('ChatRemoved')
                .listen('Messages.UserWasRemoved', (eventData) => {
                    if (self.excludeFromBroadcast(eventData.owner.id)) {
                        return;
                        // NOTE: this should be done in backend
                    }
                    if (eventData.user.id == Laravel.userId) {
                        self.notify(
                            `You were removed from this Team by ${eventData.owner.full_name}`,
                            'Team Builder'
                        );
                        setTimeout(() => {
                            location.reload();
                        }, 3000);
                    }
                });
            // subscribe to public channel to recieve new chats
            Echo.channel('ChatNew')
                .listen('Messages.NewChatWasCreated', (eventData) => {
                    // if (self.excludeFromBroadcast(eventData.invitee.id)) {
                    //     return;
                    //     // NOTE: this should be done in backend
                    // }
                    self.addToConversations(eventData.chat);
                    let message = `You were added to a New Team`;
                    let title = `New Team`;
                    console.log(`log from ChatNew`);
                    self.notify(message, title);
                });


            Echo.channel('ChatInvite')
                .listen('Messages.NewUserWasInvited', (eventData) => {
                    if (self.excludeFromBroadcast(eventData.invitee.id)) {
                        return;
                        // NOTE: this should be done in backend
                    }

                    let message = `You were invited by ${eventData.invitee.full_name}`;
                    let title = `Team Builder Invitation`;
                    self.notify(message, title);
                    let convo = eventData.conversation; // NOTE: should be done in backend
                    convo['pivot'] = {
                        has_joined: false
                    };
                    self.addToConversations(convo);
                });
        },

        excludeFromBroadcast (comparer) {
            return this.Laravel.userId == comparer;
        },

        processUsers (selectedUsers) {
            let hasPatient = this.participantsHasPatient;
            
            if (hasPatient) {
                this.form.users.pop();
                this.notify("Only one patient per Team is allowed.", 'Team Builder');
            }

        },

        getChats () {
            let self = this;
            axios.get(`/team-builder/${this.chat_id}/chats`)
                .then(({data}) => {
                    self.chat = data;
                    self.scrollDown();
                })
                .catch(res => {
                    console.error(res);
                });
        },

        send (permissionMessage = null) {
            let self = this;
            let data = null;
            let url = `/team-builder/${self.menuNew ? 'new' : self.chat_id}`;
            // const config = {
            //     onUploadProgress: (progressEvent) => {
            //         var percentCompleted = Math.round( 
            //                 (progressEvent.loaded * 100) / progressEvent.total 
            //             );
            //     }
            // };

            data = permissionMessage instanceof Event ? 
                        self.getFormData() : 
                        permissionMessage; 

            $(this.$refs.btnSend).attr('disabled', true);
            self.scrollDown();
            axios.post(url, data)
                .then(({data}) => {
                    $(this.$refs.btnSend).attr('disabled', false);
                    if (data.is_new) {
                        console.log(data.chat);
                        window.location = `/team-builder/${data.chat.id}`
                    }
                    // NOTE: currentUser should recieve the data from here
                    // not from the event
                })
                .catch(res => {

                });

            self.clear();
        },

        requestPermission () {
            $('#permissionModal').modal('show');
        },

        permissionRequested (permission) {
            let cleanPermission = this.cleanPermissionInfo(permission);
            this.send({
                'has_permission': true,
                'permission': cleanPermission,
            });
        },

        // remove extra information in permission object.
        cleanPermissionInfo (permission) {
            let user_patient = permission.user_patient;
            let user_provider = permission.user_provider;
            delete user_patient.points;
            delete user_patient.signature;
            delete user_patient.total_points;
            delete user_provider.points;
            delete user_provider.signature;
            delete user_provider.total_points;
            return permission;
        },

        getFormData () {
            let self = this;
            let data = self.form;
            let formData = new FormData();
            formData.append('message', data.message);
            data.attachments.forEach((file) => {
                formData.append('attachments[]', file);
            });
            data.users.forEach((user) => {
                formData.append('users[]', user.id);
            });
            return formData;
        },

        sendInvite () {
            let self = this,
                users = self.form.users;
            self.$refs.btnSendInvite.disabled = true;
            axios.post(`/team-builder/${self.chat_id}/invite`, {users})
                .then(res => {
                    self.notify(
                        'Invitation sent to users!',
                        'Team Invitation'
                    );
                    self.$refs.btnSendInvite.disabled = false;
                    self.menuInvite = false;
                    self.form.users = [];
                })
                .catch(res => {
                    console.error(res);
                });
        },

        participantKick (participant) {
            let self = this;
            axios.post(`/team-builder/${self.chat_id}/remove`, {
                    participant_id: participant.id
                }).then(res => {
                    if (res.data.sucess) {
                        self.notify(
                            'User was removed from Team',
                            'Team Builder'
                        )
                    }
                });
        },

        getUsers (val) {
            let self = this;
            self.searchLoading = true;
            axios.get('/team-builder/api/search/users', {
                params: { query: val }
            }).then(res => {
                self.searchLoading = false;
                self.users = res.data.data.sort((a,b) => {
                    return a.role - b.role;
                });
            })
            .catch(res => {
                console.error(res);
            });
        },

        newMessage (data) {
            let self = this;
            self.chat.conversation.replies.push(data);
            self.scrollDown();
        },

        addToConversations (conversation) {
            let self = this;
            self.chat.conversations.unshift(conversation);
        },

        attachmentChange(e) {
            let self = this;
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;

            for (var i = 0; i < files.length; i++) {
                self.form.attachments.push(files[i]);
            }
        },

        clear () {
            this.form.message = '';
            this.form.attachments = [];
            this.$refs.inputAttachment.value = '';
        },

        removeFilePreview (file) {
            // NOTE: fix this!!

            let self = this,
                attachments = self.form.attachments;

            let newItem = attachments.filter((item,index) => {
                return index !== file.id;
            });
        },

        scrollDown () {
            let container = this.$refs.repliesList;
            Vue.nextTick(function () {
                $(container).animate({
                    scrollTop: parseInt(container.scrollHeight - container.clientHeight)
                }, 100);
            });
        },

        attachmentShow () {
            $(this.$refs.inputAttachment).click();
        },

        isCreator () {
            return this.chat.conversation.user_id == this.Laravel.userId;
        },

        joinRoom () {
            let conversation = this.chat.conversation;
            this.toggleJoin(conversation.id);
        },

        toggleJoin (id) {
            axios.post(`/team-builder/${id}/join`)
                .then(res => {
                    window.location.reload();
                })
                .catch(res => {
                    console.error(res.data);
                });
        },
    },

    watch: {
        menuList (val) {
            if (val) {
                this.menuFile = false;
                this.notifier.hasNew = false;
            }
            $(this.$refs.menuList)
                .find('.menu-caret')
                .toggleClass('fa-caret-right fa-caret-left');
            $(this.$refs.menuList)
                .toggleClass('active');
        },

        menuFile (val) {
            if (val)
                this.menuList = false;

            $(this.$refs.menuFile)
                .find('.menu-caret')
                .toggleClass('fa-caret-right fa-caret-left');
        },
        menuNew (val) {
            this.menuList = false;
            this.menuFile = false;
            this.menuInvite = false;
            this.form.users = [];
        },
        menuInvite (val) {
            this.menuList = false;
            this.menuFile = false;
            this.menuNew = false;
        },
    },

    computed: {
        newNotificationClass () {
            return this.hasNewNotification ? `new-notification` : ``;
        },

        disableAction () {
            let form = this.form;
            if (this.menuNew) {
                let usersCount = form.users.length;
                return !Boolean(usersCount > 0) || !this.usersHasRequiredRole;
            }
            return !Boolean(form.message || form.attachments.length)
                    || !this.hasJoined;
        },

        disableInviteButton () {
            return !this.isCreator() || this.isPublic;
        },

        disableSendInviteButton () {
            return !this.form.users.length;
        },

        usersHasRequiredRole () {
            return Boolean(this.form.users.filter(user => {
                return user.role != this.Laravel.userRole;
            }).length);
        },

        replyListMask () {
            return this.menuNew ? 'new-active' : '';
        },

        hasFilesForPreview () {
            return this.form.attachments.length;
        },

        channelName () {
            // make this into patient's name

            if (this.isPublic)
                return `Public Chat`;

            if (!this.participantsHasPatient) 
                return 'Care Team';
            
            let patient = this.chat.conversation.patient[0];
            return `${patient.full_name}'s Care Team`;
        },

        chatAvatar () {
            if (this.isPublic)
                return;

            let conversation = this.chat.conversation;

            if (!this.participantsHasPatient)
                return conversation.user.avatar_path;

            return conversation.patient[0].avatar_path;
        },

        chatUrl () {
            return `/team-builder/${this.chat.conversation.id}`;
        },

        hasJoined () {
            return Boolean(this.chat.conversation.pivot.has_joined);
        },

        isPublic () {
            return Boolean(this.chat.conversation.chat_type > 1);
        },

        includeUserText () {
            let userRole = this.Laravel.userRole;
            return userRole == 1 ? 'Provider' : 'Patient';
        },

        joinButtonText () {
            return this.isPublic ? 'Join Public Room' : 'Join Team'
        },

        attachmentsImages () {
            let attachments = this.chat.conversation.attachments;
            return attachments.filter((attachment) => {
                return attachment.is_image;
            });
        },

        attachmentsFiles () {
            let attachments = this.chat.conversation.attachments;
            return attachments.filter((attachment) => {
                return !attachment.is_image;
            });
        },

        userIsPatient () {
            return Laravel.userRole == 1;
        },

        participantsHasPatient () {
            if (!this.chat.conversation)
                return;
            let participants = this.chat.conversation.participants;
            return participants.filter(participant => {
                return participant.role == 1;
            }).length;
        },

        patientInfo () {
            let conversation = this.chat.conversation;
            if (!conversation.patient.length) 
                return;

            return conversation.patient[0].patient || '';
        }
    },
});
