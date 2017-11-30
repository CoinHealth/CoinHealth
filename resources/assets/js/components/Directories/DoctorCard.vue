<style scoped>
.action-link {
    cursor: pointer;
}
</style>
<template>
    <div class="col-md-4 col-sm-6 col-xs-6">
        <a @click.prevent="preview" class="action-link">
            <div class="wrapper">
                <!-- <img src="/assets/icons/premium-listing.jpg" alt="" height="200"> -->
                <div class="listing-image" :style="avatar">
                    <div v-show="hasOwner" class="listing-icon" :style="styleObject"></div>
                </div>
                <div class="ribbon-wrapper-yellow" v-if="doctor.is_subscribed">
                    <div class="ribbon-yellow">SUGGESTED</div>
                </div>
            </div>
            <div class="list-info">
                <p>
                    <span>
                        <strong class="full-name">{{ doctor.name }}</strong>
                    </span>
                    <span class="address ellipsis">
                        <!-- {{ doctor.full_address }} -->
                    </span>
                    <!-- <span>19.6 miles away</span> -->
                    <span class="contact">
                        {{ doctor.phone }}
                    </span>
                </p>
            </div>
        </a>
    </div>
</template>
<script>
import Bus from '../../Bus.js';

export default {
    props: {
        doctor: {
            required: true,
            type: Object,
        },
        defaultAvatar: {
            default () {
                return '/assets/icons/doctor-placeholder.jpg';
            }
        }
    },

    data () {
        return {
            styleObject: {
                backgroundImage: `url(${this.doctor.user ? (this.doctor.is_premium ? '/images/icon-colored.png' : '/images/icon-white.png') : ''})`,
            },
            avatar: {
                backgroundImage: `url(${this.doctor.avatar_path ? this.doctor.avatar_path : this.defaultAvatar})`,
            }
        }
    },

    computed: {
        hasOwner () {
            return Boolean(this.doctor.user);
        },
    },

    methods: {
        preview () {
            this.fetch();
        },

        fetch () {
            let self = this;
            this.$http.get(`/directory/doctors/api/${this.doctor.provider_id}`)
            .then((response) => {
                // check if provider is multiple.
                if (response.body.length > 1) {
                    // response.body.forEach();
                }
                console.log(response.body);
                Bus.$emit('modal-preview', response.body);
            });
        },
    },
}
</script>
