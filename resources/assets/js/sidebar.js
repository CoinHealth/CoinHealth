import UploadPhoto from './components/UploadPhoto.vue';
const sidebar = new Vue({
    el: '#sidebar',
    components: {
        "upload-photo": UploadPhoto,
    },
    mounted () {
        $('[data-toggle=tooltip]').tooltip();
    },

});
