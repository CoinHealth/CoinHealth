<style scoped>
.action-link {
    cursor: pointer;
}
</style>
<template>
    <div class="col-md-4 col-sm-6 col-xs-6">
        <a @click.prevent="preview" class="action-link">
            <div class="wrapper">
                <div class="listing-image" style="background-image: url(/assets/icons/doctor-placeholder.jpg);">
                    <div class="listing-icon" :style="styleObject"></div>
                </div>
            </div>
            <div class="list-info">
                <p>
                    <span>
                        <strong class="full-name">{{ agent.user.full_name }}</strong>
                    </span>
                    <span class="address ellipsis">
                      {{ agent.user.full_address }}
                    </span>

                    <span class="contact">
                        {{ agent.user.contact }}
                    </span>
                </p>
            </div>
        </a>
    </div>
</template>
<script>
import Bus from '../../../Bus.js';

export default {
    props: {
        agent: {
            required: true,
            type: Object,
        }
    },

    data () {
        return {
            styleObject: {
                backgroundImage: `url(${this.agent.is_subscribed ? '/images/icon-colored.png' : (this.agent.is_premium ? '/images/icon-white.png' : '' ) })`,
            }
        }
    },

    computed: {

    },

    methods: {
        preview () {
            this.fetch();
        },

        fetch () {
            let self = this;
            this.$http.get(`/directory/agents/api/${this.agent.id}`)
            .then((response) => {
                // console.log(response.body);
                Bus.$emit('modal-preview', response.body);
            });
        },
    },
}
</script>
