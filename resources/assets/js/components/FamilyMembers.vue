<template>
    <div class="members-wrapper">
        <checkbox-toggle :checked="member.age" :input-value="member.age" :key="member.id" v-for="member in data">
            {{ member.member }}
        </checkbox-toggle>
    </div>
</template>
<script>
import CheckboxToggle from '../helpers/CheckboxToggle.vue';
export default {
    props: {
        id: {
            type: String,
            required: true,
        },
        members: {
            required: true,
            type: Array,
        }
    },
    components: {
        'checkbox-toggle': CheckboxToggle,
    },
    data () {
        return {
            defaultMembers: [
                {
                    member: 'Father',
                    age: 0,
                },
                {
                    member: 'Mother',
                    age: 0,
                },
                {
                    member: 'Brother',
                    age: 0,
                },
                {
                    member: 'Sister',
                    age: 0,
                },
                {
                    member: 'Grandfather',
                    age: 0,
                },
                {
                    member: 'Grandmother',
                    age: 0,
                },
                {
                    member: 'Uncle',
                    age: 0,
                },
                {
                    member: 'Auntie',
                    age: 0,
                },
            ],
            data: [],
        };
    },
    mounted() {
        this.mapMembers();
    },
    methods: {
        mapMembers () {
            let self = this;
            self.data = _.uniqBy(_.concat(self.members,self.defaultMembers), 'member');
        },
    },
}
</script>
<style scoped>
.members-wrapper {
    margin-bottom: 3px;
    border-bottom: 2px solid #e9e9e9;
}
</style>
