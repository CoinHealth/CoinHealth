<template>
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-save">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirmation</h4>
                </div>
                <div class="modal-body">
                    <h4>
                        {{ displayText }}
                    </h4>
                    <div class="alert alert-success" role="alert" style="display: none;">
                        <strong>{{ response.status }}</strong>
                        <p>{{ response.message }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnClose" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" @click="save" class="btn btn-primary btnSave">Yes</button>
                </div>

            </div>
        </div>
    </div>

</template>
<script>
import Bus from '../../Bus.js';
export default {
    data () {
        return {
            id: 0,
            role: 1,
            response: {
                status: '',
                message: '',
            },
        };
    },

    mounted () {
        this.init
        Bus.$on('modal-save', this.preload);
        Bus.$on('modal-close', this.close);
    },
    methods: {
        init () {
            let btnSave = $('.btnSave');
            btnSave.prop('disabled', false)
                    .text('Yes');
        },
        preload (obj) {
            this.id = obj.provider_id;
            this.purpse = obj.role;
            $(this.$el).modal('show');
        },
        save () {
            let self = this;
            let btnSave = $('.btnSave');
            btnSave.prop('disabled', true)
                    .text('Saving...');

            this.$http.post('/directory/doctors', {
                provider_id: this.id,
            }).then(({body}) => {
                self.response.status = body.success ? 'Well done!' : 'Oh snap!';
                self.response.message = body.message;
                $(self.$el).find('.alert').fadeIn();

                if (body.success)
                    self.$emit('success', body);
            });
        },
        close () {
            let self = this;
            let btnSave = $('.btnSave');
            let time = 3;
            let timer = setInterval( () => {
                time--;
                $(self.$el).find('#btnClose').text(`Close`);
                console.log(time);
                if (time == 0) {
                    clearInterval(timer);
                }
            }, 3000);
            $(this.$el).modal('hide');
            $(self.$el).find('.alert').hide();
            btnSave.prop('disabled', false)
                    .text('Yes');

        },
    },
    computed: {
        displayText () {
            return 'Are you sure you want to add this provider to your directory?';
            //return this.purpose == 1 ?
                    //'Are you sure you want to add this provider to your directory?' :
                    //'Are you sure you want to claim this listing?';
        },
    }
}
</script>
