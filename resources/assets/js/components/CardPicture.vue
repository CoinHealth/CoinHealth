<template>
    <div class="upload-container">
        <picture-input
            ref="pictureInput"
            @change="change"
            @remove="remove"
            width="500"
            height="550"
            margin="16"
            accept="image/*"
            size="5"
            :prefill="prefillPath"
            buttonClass="btn btn-info btn-lg upload-btns"
            removeButtonClass="btn btn-info btn-lg upload-btns"
            :removable="true"
            :crop="false"
            :customStrings="customMessage">
        </picture-input>
        <button
            ref="btnUpload"
            v-if="imageSelected"
            type="button"
            class="btn btn-info btn-lg upload-btns"
            @click="upload">
            Upload
        </button>
    </div>
</template>

<script>
import PictureInput from 'vue-picture-input';
import axios from 'axios';
export default {
    components: {
        PictureInput,
    },

    props: ['prefillPath'],

    data () {
        return {
            imageSelected: false,
            uploading: false,
            uploaded: false,
            customMessage: {
                drag: '<p>Drag or Click here to upload Picture.</p>',
            }
        }
    },

    methods: {
        change () {
            if (this.$refs.pictureInput.imageSelected)
                this.imageSelected = true;
        },

        upload () {
            var vm = this;
            var fd = new FormData();
            vm.uploading = true;
            this.$refs.btnUpload.disabled = true;
            fd.append('insurance_card', this.$refs.pictureInput.file);
            axios.post('/profile/coverage/insurance-card', fd)
                .then(res => {
                    vm.uploading = false;
                    vm.uploaded = true;
                    vm.$refs.btnUpload.disabled = false;
                    vm.$emit('card-uploaded');
                });
        },

        remove () {
            let self = this;
            this.imageSelected = false;
            axios.delete(`/profile/coverage/insurance-card`)
                .then(res => {
                    self.$emit('card-removed');
                });
        },
    }
}
</script>
