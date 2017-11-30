<template>
    <ul class="list-unstyled list">
        <participant :key="participant.id"
            :is-owner="isOwner"
            :participant="participant"
            v-for="participant in participants">
        </participant>
    </ul>
</template>

<script>
import axios from 'axios';
import Participant from './Participant.vue';
export default {
    components: {
        'participant': Participant,
    },

    props: {
        participants: {
            type: [Array,Object]
        },
        isOwner: {
            type: [Boolean, Function],
            default () {
                return false;
            },
        }
    },
}
</script>
