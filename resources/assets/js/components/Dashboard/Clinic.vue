<template>
    <div class="panel panel-default branch-wrapper">
        <div class="panel-heading">
            {{ clinic.full_address }}
        </div>
        <div class="panel-body">
            <div v-if="!editing">
                <p>
                    Contact Number: <span>{{ clinic.phone }}</span>
                </p>
                <p>
                    Operation Hours: <span>{{ clinic.operation_hours }}</span>
                </p>
            </div>
            <div v-else class="form-horizontal">
                <div class="form-group">
                    <label class="col-md-3 form-label">Contact No.</label>
                    <div class="col-md-9">
                        <input v-model="clinic.phone" type="text" class="form-control input-sm">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 form-label">Operation Hours</label>
                    <div class="col-md-9">
                        <input v-model="clinic.operation_hours" type="text" class="form-control input-sm">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 form-label">Address</label>
                    <div class="col-md-9">
                        <v-address @update:address="updateAddress" model="address" :data="clinic.address">
                        </v-address>
                    </div>
                </div>

            </div>
        </div>
        <div class="panel-footer">
            <div class="text-right">
                <transition name="popup">
                    <button ref="btnEdit" @click="editing = true" v-if="!editing" class="btn btn-xs btn-primary">
                        <i class="fa fa-pencil"></i> <span>Edit</span>
                    </button>
                </transition>
                <!-- <transition name="popup">
                    <button ref="btnDelete" @click="deleteClinic" v-if="!editing" class="btn btn-xs btn-danger">
                        <i class="fa fa-times"></i> <span>Delete</span>
                    </button>
                </transition> -->
                <transition name="popup">
                    <button ref="btnSave" @click="saveClinic" v-if="editing" class="btn btn-xs btn-success">
                        <i class="fa fa-floppy-o"></i> <span>Save</span>
                    </button>
                </transition>
                <transition name="popup">
                    <button ref="btnCancel" v-if="editing" @click="editing = false" class="btn btn-xs btn-danger">
                        <i class="fa fa-ban"></i> <span>Cancel</span>
                    </button>
                </transition>
            </div>
        </div>
    </div>
</template>

<script>
import Address from '../../helpers/Address.vue';
export default {
    components: {
        'v-address': Address,
    },
    props: {
        data: {
            type: Object,
            required: true,
        },
    },
    data () {
        return {
            clinic: this.data,
            editing: false,
        };
    },

    methods: {
        saveClinic () {
            $(this.$refs.btnSave).attr('disabled', true);
            this.$emit('clinic-save', this.clinic);

        },
        deleteClinic () {
            this.$emit('clinic-delete', this.clinic);
        },
        updateAddress (data) {
            this.clinic.address = data;
        }
    },
}
</script>
