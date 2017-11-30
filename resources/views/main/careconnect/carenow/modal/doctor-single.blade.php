<!-- Modal -->

<div class="modal fade" v-if="dataDoctor" id="doctor-single" tabindex="-1" role="dialog">
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
                                @{{ dataDoctor.full_name }}
                            </h2>
                            <ul class="specializations-list">
                                <li v-for="specialization in dataDoctor.specializations">
                                    <p class="subtitle">
                                        @{{ specialization.name }}
                                    </p>
                                </li>
                            </ul>
                            <p class="address" v-for="(address, index) in dataDoctor.address">
                                @{{ address.street }}<br>
                                @{{ address.city }}, @{{ address.state }} @{{ address.zip }}.
                                <span class="phone">
                                    <a href="#">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        @{{ dataDoctor.phone[index] }}
                                    </a>
                                </span>
                            </p>
                            <div class="stars">
                                <i class="fa fa-star yellow" aria-hidden="true"></i>
                                <i class="fa fa-star yellow" aria-hidden="true"></i>
                                <i class="fa fa-star yellow" aria-hidden="true"></i>
                                <i class="fa fa-star yellow" aria-hidden="true"></i>
                                <i class="fa fa-star yellow" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-center">
                            <img src="/assets/icons/doctor-placeholder.jpg" class="img-med" alt="">
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
                            <button type="button" class="btn btn-info" @click="bookmark('doctor', dataDoctor.id, $event.target)">
                                <i class="fa fa-bookmark" aria-hidden="true"></i> <span>SAVE TO YOUR PROFILE</span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
