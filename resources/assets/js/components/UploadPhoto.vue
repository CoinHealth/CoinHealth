<template>
    <form action="/profile/avatar"
            method="post" enctype="multipart/form-data"
            @submit.prevent="submit">
        <div class="text-center">
            <div class="upload-photo">
                <img v-show="imageSrc" class="upload-img" 
                    :src="src"
                    @click="toggleUpload"
                >
                <!-- <p class="imgCaption" @click="toggleUpload"><span><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</span></p> -->
            </div>
            <div class="clear"></div>

            <button type="button"
                v-show="isReadyToSave"
                class="a-change btn btn-xs btn-primary"
                @click="toggleUpload">
        		Change
        	</button>

            <button type="submit"
                v-show="isReadyToSave"
                class="a-change btn btn-xs btn-success">
        		Save
        	</button>

            <input ref="inputFile"
                class="hidden"
                type="file"
                name="avatar"
                @change="previewThumbnail"
                accept="image/*" />
        </div>
    </form>

</template>
<script>
    export default {
        data () {
            return {
                isReadyToSave : false,
                src: this.imageSrc,
            };
        },
        props: [
            "imageSrc",
        ],

        methods : {
            previewThumbnail (event) {
                var input = event.target;

                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    var vm = this;

                    reader.onload = function(e) {
                        vm.src = e.target.result;
                    }

                    reader.readAsDataURL(input.files[0]);
                    vm.isReadyToSave = true;
                }
            },

            toggleUpload (event) {
                var btn = event.target;
                this.$refs.inputFile.click();
            },

            submit (event) {
                this.src = "/assets/icons/loading.svg";
                var fd = new FormData();
                fd.append('avatar', this.$refs.inputFile.files[0]);
                this.$http.post('/profile/avatar', fd)
                    .then( ({body}) => {
                        console.log(body);
                        if (body.success) {
                            // window.location.reload();
                            this.src = body.path;
                            this.isReadyToSave = false;
                            var modal = $('#modal-gamification');
                            if(body.points != '') {
                                modal.modal('show');
                                modal.find('.points').text(body.points);
                                modal.find('.points-desc').text(body.award);
                            }
                        }
                    });

            },
        },
    }
</script>
