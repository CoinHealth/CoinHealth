<!-- Modal -->

<div class="modal fade" v-if="dataFacility" id="facility-single" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-pl" role="document">
        <button type="button" class="btn btn-default close-btn" data-dismiss="modal">&#215;</button>
        <div class="modal-content">
            <div class="modal-body">

                <div class="modal-div-title row">
                    <p>FACILITY</p>
                </div>

                <div class="first-row row">

                    <div class="col-md-12 text-center">
                        <h2 class="title">
                            @{{ dataFacility.name }}
                        </h2>
                        <p class="subtitle">
                            @{{ dataFacility.category }}
                        </p>
                        <p class="address" v-for="address in dataFacility.address">
                            @{{ address.street }}<br>
                            @{{ address.city }}, @{{ address.state }} @{{ address.zip_code }}
                            <span class="phone">
                                <a href="#">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                     @{{ dataFacility.phone[index] }}
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
                            <button type="button" @click="bookmark('facility', dataFacility.id, $event.target)" class="btn btn-info">
                                <i class="fa fa-bookmark" aria-hidden="true"></i> <span>SAVE TO YOUR PROFILE</span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
