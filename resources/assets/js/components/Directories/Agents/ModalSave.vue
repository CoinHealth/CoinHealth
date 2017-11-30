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
                    <button type="button" @click="save" class="btn btn-primary">Yes</button>
                </div>

            </div>
        </div>
    </div>

</template>
<script>
import Bus from '../../../Bus.js';
export default {
    data () {
        return {
            agent_id: 0,
            response: {
                status: '',
                message: '',
            },
        };
    },

    mounted () {
        Bus.$on('modal-save', this.preload);
        Bus.$on('modal-close', this.close);
    },
    methods: {
        preload (obj) {
            this.agent_id = obj.agent_id;
            $(this.$el).modal('show');
        },
        save () {
            let self = this;
            this.$http.post('/directory/agents', {
                agent_id: this.agent_id,
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

        },
    },
    computed: {
        displayText () {
            return 'Are you sure you want to add this agent to your directory?';
        },
    }
}
</script>
