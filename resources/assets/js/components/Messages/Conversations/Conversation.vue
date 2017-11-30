<template>
    <li :class="['conversation', active]"
        @mouseover="hovering = true"
        @mouseleave="hovering = false">
        <a href="#" @click.prevent.click="goto">
            <p class="conversation-wrapper">
                {{ name }}
                <transition name="popup">
                    <div class="pull-right conversation-action"
                        v-if="hovering">
                        <button @click.stop="toggleJoin"
                            v-if="!conversation.pivot.has_joined"
                            class="btn btn-xs btn-info">
                            <i class="fa fa-sign-in"></i> Join
                        </button>
                        <button @click.stop="toggleJoin"
                            v-else
                            class="btn btn-xs btn-info">
                            <i class="fa fa-sign-out"></i> Leave
                        </button>
                    </div>
                </transition>
            </p>
        </a>
    </li>
</template>
<script>
import axios from 'axios';
import Bus from '../../../Bus.js';
export default {
    props: {
        conversation: {
            type: Object,
            required: true,
        }
    },

    data () {
        return {
            hovering: false,
        };
    },

    methods: {
        toggleJoin () {
            Bus.$emit('toggle-join', this.conversation.id);
        },

        toggleAccept () {
            Bus.$emit('toggle-accept', this.conversation.id);
        },
        goto () {
            location.href = `/team-builder/${this.conversation.id}`;
        },
    },

    computed: {
        active () {
            let href = location.href;
            let id = this.conversation.id;
            return href.match(new RegExp(id)) ? 'active' : '';
        },

        name () {
            if (this.conversation.chat_type == 2)
                return `Public Chat`;

            let user = this.conversation.user,
                name = user ? user.full_name : '';
            return `${name} Care Team`;
        },

        // url () {
        //     let conversation = this.conversation;
        //     return !this.conversation.pivot.has_joined || this.active ?
        //                 '#' : `/team-builder/${conversation.id}`;
        // },
        isPublic () {
            return this.conversation.chat_type > 1;
        },
    },
}
</script>
