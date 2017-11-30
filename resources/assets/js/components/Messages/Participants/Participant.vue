<template>
    <li class="participant-wrapper"
        @mouseenter="hovered = true"
        @mouseleave="hovered = false"
        v-if="participant.pivot.has_joined">
        <i :class="['fa','fa-circle','participant-presence',active]"></i>
        <span class="participant-name">{{ participant.full_name }}</span>
        <transition name="popup" v-if="hovered">
            <button v-if="canKick"
                data-toggle="tooltip"
                title="Remove User"
                class="btn btn-xs btn-danger pull-right"
                @click="kick">
                <i class="fa fa-user-times"></i>
            </button>
        </transition>
    </li>
</template>
<script>
import Bus from '../../../Bus.js';
export default {
    props: {
        participant: {
            type: Object,
        },
        isOwner: Function,
    },
    data () {
        return {
            hovered: false,
        };
    },
    mounted () {
        $('[data-toggle="tooltip"]').tooltip();
    },
    computed: {
        active () {
            return this.participant.online ? 'active' : '';
        },
        canKick () {
            return this.isOwner() && Laravel.userId != this.participant.id;
        },
    },
    methods: {
        kick () {
            Bus.$emit('participant-remove', this.participant);
        }
    },
}
</script>
