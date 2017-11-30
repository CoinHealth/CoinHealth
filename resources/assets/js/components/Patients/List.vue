<template>
    <div class="col-md-6 patient-item">
        <div class="patient-header" @click="togglePopup">
            <div class="media">
                <div class="media-left">
                    <a href="#">
                        <img class="media-object" :src="avatar">
                    </a>
                </div>
                <div class="media-body">
                    <button
                        @click.stop="opened = false"
                        v-show="opened"
                        type="button"
                        class="close"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="media-heading">
                        <span class="name">{{ name }}</span>
                    </h4>
                    <p class="email">
                        {{ patient.email }}
                    </p>
                </div>
            </div>
        </div>
        <div class="patient-body">
            <div class="row" v-if="patient.current_address">
                <div class="col-md-4 col-xs-6">
                    Address
                </div>
                <div class="col-md-8 col-xs-6">
                    {{ patient.current_address | addressify }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-xs-6">
                    Gender
                </div>
                <div class="col-md-8 col-xs-6">
                    {{ patient.gender }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-xs-6">
                    Date of Birth
                </div>
                <div class="col-md-8 col-xs-6">
                    {{ dob }}
                </div>
            </div>
            <div class="row" v-if="languages">
                <div class="col-md-4 col-xs-6">
                    Languages
                </div>
                <div class="col-md-8 col-xs-6">
                    {{ languages }}
                </div>
            </div>


            <transition name="popup">
                <div class="patient-popup" v-if="opened">
                    <a :href="urlify('')" class="btn btn-block btn-primary">
                        View Patient 
                    </a>
                    <a :href="urlify('appointments/')" 
                        class="btn btn-block btn-primary">
                        Appointment List
                    </a>
                    <a :href="urlify('informations/')" 
                        class="btn btn-block btn-primary">
                        Patient Information
                    </a>
                    <a data-toggle="tooltip" 
                        data-placement="bottom" 
                        title="Coming Soon" 
                        @click.prevent.stop="" 
                        :href="urlify('history/')" 
                        class="btn btn-block btn-primary">
                        Patient History
                    </a>
                    <a data-toggle="tooltip" 
                        data-placement="bottom" 
                        title="Coming Soon" 
                        @click.prevent.stop="" 
                        :href="urlify('problems/')" 
                        class="btn btn-block btn-primary">
                        Problems
                    </a>
                    <a :href="urlify('medications/')" 
                        class="btn btn-block btn-primary">
                        Medications
                        <span class="badge pull-right" 
                            v-if="patient.medications">
                            {{ patient.medications | count }}
                        </span>
                    </a>
                    <a :href="urlify('allergies/')" 
                        class="btn btn-block btn-primary">
                        Allergies
                    </a>
                    <a :href="urlify('laboratories/')" 
                        class="btn btn-block btn-primary">
                        Laboratory
                    </a>
                     <!-- @click.prevent.stop=""  -->
                    <a :href="urlify('flags/')" 
                        class="btn btn-block btn-primary">
                        Flags
                    </a>
                    <a :href="urlify('erx/')" 
                        class="btn btn-block btn-primary">
                        eRx
                    </a>
                </div>
            </transition>
        </div>
    </div>
</template>

<script>
import moment from 'moment';
export default {
    props: {
        patient: {
            type: Object,
            required: true,
        }
    },

    data () {
        return {
            opened: false,
        };
    },

    mounted () {
        $('[data-toggle="tooltip"]').tooltip();
    },

    methods: {
        togglePopup () {
            this.$emit('opened', this);
            this.opened = !this.opened;
        },

        urlify (path = '') {
            path = path ? `${path}` : path;
            let base = `${window.location.pathname}`.replace(/\/?$/, '/');
            let newPath = `${base}${path}`;
            return `${newPath}${this.patient.url_id}`;
        }
    },

    filters: {
        addressify (value) {
            if (value instanceof Object) {
                return `${!value.street_1 ?'': value.street_1} ${!value.street_2?'':value.street_2} ${!value.city?'':value.city} ${!value.state?'':value.state} ${!value.zip?'':value.zip}`;
            }
            else {
                return '';
            }
        },

        count (value) {
            if (!value)
                return;
            return value.length;
        }
    },

    computed: {
        name () {
            return `${this.patient.first_name} ${this.patient.middle_name !== null ? this.patient.middle_name : ''} ${this.patient.last_name}`
        },
        avatar () {
            return this.patient.avatar_path;
        },

        dob () {
            return  moment(this.patient.dob, 'YYYY-MM-DD h:i:s').isValid() ? moment(this.patient.dob).calendar() : '';
        },

        languages () {
            return (this.patient.language  instanceof Array) ? this.patient.language.join(', ') : '';
        },
    },
}
</script>
