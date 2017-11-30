 <template>
    <div class="modal fade" id="modal-preview" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-pl" role="document">
            <button type="button" class="btn btn-default close-btn" data-dismiss="modal">&#215;</button>
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-div-title row">
                        <p>Doctor</p>
                    </div>

                    <div class="first-row row">
                        <div class="col-md-6">
                            <div class="text-center">
                                <h2 class="title">
                                    {{ data.name }}
                                </h2>
                                <div class="facility-list">
                                    <p class="address" v-for="facility in data.facilities">
                                        {{ facility.address }} <br>
                                        <span class="phone">
                                            <a href="#">
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                                {{ facility.phone }}
                                            </a>
                                        </span>
                                    </p>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-center">

                                <img src="/assets/icons/doctor-placeholder.jpg" class="img-med" alt="">
                                
                                <ul class="specializations-list">
                                    <li v-for="specialty in data.specialties">
                                        <p class="subtitle">
                                            {{ specialty }}
                                        </p>
                                    </li>
                                </ul>

                                <div class="stars">
                                    <i class="fa fa-star yellow" aria-hidden="true"></i>
                                    <i class="fa fa-star yellow" aria-hidden="true"></i>
                                    <i class="fa fa-star yellow" aria-hidden="true"></i>
                                    <i class="fa fa-star yellow" aria-hidden="true"></i>
                                    <i class="fa fa-star yellow" aria-hidden="true"></i>
                                </div>

                                <div class="clear"></div>

                                <button type="button" class="btn btn-info mt-15" v-show="showButton" @click="submit">
                                    <i class="fa fa-bookmark" aria-hidden="true"></i> <span>{{ roleText }}</span>
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
import Bus from '../../Bus.js';
export default {
    data () {
        return {
            data: {
                name,
                specialties: [],
            },
            role: 0,
            provider_count: 0,
            directory: 0,
        }
    },
    mounted () {
        Bus.$on('modal-preview', this.show);
        Bus.$on('modal-close', this.close);
    },
    methods: {
        show (data) {
            if (data.provider.length) {
                this.data = data.provider[0];
                this.data.facilities = [];
                if (data.provider.length > 1) {
                    data.provider.forEach((item, index) => {
                        this.data.facilities.push({
                            address: item.full_address,
                            phone: item.phone
                        });
                    });
                }
                else {
                    this.data.facilities.push({
                        address: this.data.full_address,
                        phone: this.data.phone
                    });
                }
                console.log(data.facilities);
            }
            this.role = Number(data.role);
            this.provider_count = Number(data.provider_count);
            this.directory = Number(data.directory);
        },
        submit () {
            if (!Laravel.isAuthenticated) {
                window.location.assign('/auth/login')
            }
            console.log(this );
            if (this.role == 2) {
                $(this.$el).modal('hide');
                Bus.$emit('modal-premium', {
                    provider_id: this.data.provider_id,
                    purpose: this.role,
                });
            }
            else if (this.role == 1) {
               $(this.$el).modal('hide');
               Bus.$emit('modal-save', {
                    provider_id: this.data.provider_id,
                    purpose: this.role,
                });

            } 
            // or just save it to directories (bookmark)

        },
        close () {
            $(this.$el).modal('hide');
        },
    },
    computed: {
        roleText () {
            var text = '';
            if(this.role == 0) {
                text = 'If this is you, sign-in and claim';
            }
            else if(this.role == 1) {
                text = 'SAVE TO YOUR PROFILE';
            }
            else if(this.role == 2) {
                text = 'CLAIM PROVIDER';
            }
            return text;
        },

        showButton () {
            return (this.role == 0) || (this.role == 2 && this.provider_count == 0) || (this.role == 1 && this.directory == 0 ) ;
        }
    },
    watch: {
        data (newData) {
            $(this.$el).modal('show');
        }
    },
}
</script>
