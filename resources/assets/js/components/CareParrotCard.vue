<template>
    <div class="careparrot-card col-md-12">
        <div class="row header">
            <div class="col-md-12">
                <img src="/images/cp-text-white.png" alt="" class="pull-left">
                <div class="right-wrapper pull-right text-right">
                    <p>Rock Hill, South Carolina</p>
                    <p>888-988-5866</p>
                </div>
            </div>
        </div>
        <div class="row body">
            <div class="col-xs-5 text-right">
                <img class="id-placeholder" :src="path">
            </div>
            <div class="col-xs-7 text-left">
                <h2>
                    {{ full_name }}
                </h2>
            </div>
        </div>
        <div class="footer row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-5">
                        <p>DATE OF BIRTH</p>
                    </div>
                    <div class="col-xs-7">
                        <p>{{ dob }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-5">
                        <p>GENDER</p>
                    </div>
                    <div class="col-xs-7">
                        <p v-if="careparrot">{{ careparrot.gender }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-5">
                        <p>E-MAIL</p>
                    </div>
                    <div class="col-xs-7">
                        <p v-if="careparrot">{{ careparrot.email }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-5">
                        <p>ID CONTROL</p>
                    </div>
                    <div class="col-xs-7">
                        <p>{{ control_id }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-5">
                        <p>CONTACT</p>
                    </div>
                    <div class="col-xs-7">
                        <p v-if="careparrot">{{ careparrot.contact }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import moment from 'moment';
var Hashids = require('hashids');
let hasher = null;
export default {
    props: {
        careparrot: {
            type: Object,
        },
    },
    mounted () {
        hasher = new Hashids(Laravel.salt, 10);
    },
    computed: {
        dob () {
            if (!this.careparrot)
                return;
            let dob = this.careparrot.dob;
            return moment(dob).format('MMMM Do YYYY');
        },
        full_name () {
            if (!this.careparrot)
                return;
            return `${this.careparrot.first_name} ${this.careparrot.last_name}`;
        },
        control_id () {
            if (!this.careparrot)
                return;
            let id = this.careparrot.control_id ? this.careparrot.control_id : 0;
            return hasher ? hasher.encode(id) : null;
        },
        path () {
            return this.careparrot ? this.careparrot.careparrot_id : '/images/cp-card-id-placeholder.png';
        }
    }
}
</script>
