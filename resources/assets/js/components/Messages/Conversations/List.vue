<template>
    <ul class="list-unstyled conversations-list list">
        <conversation
            :conversation="conversation"
            v-for="conversation in conversations"
            :key="conversation.id">
        </conversation>
    </ul>
</template>
<script>
import axios from 'axios';
import Conversation from './Conversation.vue'
export default {
    components: {
        'conversation': Conversation
    },

    props: {
        conversations: {
            type: Array,
            required: true
        },
    },
}
</script>
