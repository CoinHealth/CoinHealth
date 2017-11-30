
    <transition name="popup" v-if="menuNew">
        @include('messages.partials.new')
    </transition>
    <transition name="popup" v-if="menuInvite">
        @include('messages.partials.invite')
    </transition>
    <div class="message-input-wrapper">
        <div v-if="hasJoined || menuNew">
            <textarea
                @keyup.enter.prevent.stop="send"
                ref="inputMessage" placeholder="Type your message here.."
                v-model="form.message"
                class="reply-body">
            </textarea>
            <input
                @change="attachmentChange"
                type="file"
                ref="inputAttachment"
                multiple
                class="hidden">
            <div class="preview-container" v-if="hasFilesForPreview">
                <transition-group name="popup">
                    <upload-preview
                        :file="file"
                        :index="index"
                        :key="index"
                        @delete-preview="removeFilePreview"
                        v-for="(file, index) in form.attachments">
                    </upload-preview>
                </transition-group>
            </div>
        </div>
        <div v-else>
            <div class="alert alert-info" role="alert">
                <p>
                    You must join this Conversation to be able to send messages
                </p>
                <button type="button"
                    @click="joinRoom"
                    class="btn btn-info btn-sm">
                    <span>@{{ joinButtonText }}</span>
                    <i class="fa fa-sign-in"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="actions-container">
        @include('messages.partials.buttons')
    </div>
