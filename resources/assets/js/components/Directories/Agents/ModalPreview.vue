<template>
    <div class="modal fade" id="modal-preview" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-pl" role="document">
            <button type="button" class="btn btn-default close-btn" data-dismiss="modal">&#215;</button>
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-div-title row">
                        <p>Agent</p>
                    </div>

                    <div class="first-row row">
                        <div class="col-md-6">
                            <div class="text-center">
                                <h2 class="title" v-if="agent.user">
                                    {{ agent.user.full_name }}
                                </h2>

                                <p>Job Title: {{ agent.job_title }}</p>
                                <p>Affiliation: {{ agent.affiliation }}</p>
                                <div v-if="agent.user">
                                  <p>{{ agent.user.contact }}</p>
                                  <p>{{ agent.user.full_address }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-center">

                                <img src="/assets/icons/doctor-placeholder.jpg" class="img-med" alt="">
                               
                                <div class="stars mt-10">
                                    <i class="fa fa-star yellow" aria-hidden="true"></i>
                                    <i class="fa fa-star yellow" aria-hidden="true"></i>
                                    <i class="fa fa-star yellow" aria-hidden="true"></i>
                                    <i class="fa fa-star yellow" aria-hidden="true"></i>
                                    <i class="fa fa-star yellow" aria-hidden="true"></i>
                                </div>

                                <div class="clear"></div>

                                <button type="button" class="btn btn-info mt-10" v-show="showButton" @click="submit">
                                    <i class="fa fa-bookmark" aria-hidden="true"></i> <span>{{ buttonText }}</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="se-row row">
                        <hr>
                        <div class="col-md-12">
                            <div class="text-center">
                                <p class="disclaimer">
                                    <a href="#">Click here for the American Society of Health-System Pharmacists, Inc</a>.
                                    Disclaimer. ASHP® Consumer Medication Information. © Copyright, 2014. <br>
                                    The American Society of Health-System Pharmacists, Inc., 7272 Wisconsin Avenue, Bethesda, Maryland. <br>
                                    All Rights Reserved. Duplication for commercial
                                    use must be authorized by ASHP.
                                </p>
                                <div class="clear"></div>
                                   
                            </div>
                        </div>
                    </div>

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
            data: {
                agent: {},
            },
            agent: {},
            owned: 0,
            is_saved: 0,
        }
    },
    mounted () {
        Bus.$on('modal-preview', this.show);
        Bus.$on('modal-close', this.close);
    },
    methods: {
        show (data) {
            let self = this;  
            self.data = data;          
            self.agent = data.agent;
            self.owned = Number(data.owned);
            self.is_saved = Number(data.is_saved);
        },
        submit () {
            if (!Laravel.isAuthenticated) {
                window.location.assign('/auth/login')
            }
            else {

              if (this.owned == 0) {
                // open modalsave
                Bus.$emit('modal-save', {
                    agent_id: this.agent.id,
                });
              }
              else {
                // open premium listing modal
                Bus.$emit('modal-premium', {
                    agent_id: this.agent.id,
                });

              }
              $(this.$el).modal('hide');
            }

        },
        close () {
            $(this.$el).modal('hide');
        },
    },
    computed: {
        buttonText () {
            return this.owned == 0 ? 'SAVE TO PROFILE' : 'SUBSCRIBE';
        },
        showButton () {
            return (this.owned == 0 && this.is_saved == 0) || (this.owned != 0 && this.agent.is_premium == false); //or if owner and not yet subscribe
            // or if already saved
        }
    },
    watch: {
       data (newData) {
            $(this.$el).modal('show');
        }
    },
}
</script>
