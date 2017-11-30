<!-- Modal -->

<div class="modal fade" v-if="dataMedication" id="medications-single" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-pl" role="document">
    <button type="button" class="btn btn-default close-btn" data-dismiss="modal">&#215;</button>
    <div class="modal-content">
      <div class="modal-body">
        <div class="clear"></div>

        <div class="modal-div-title row">
            <p>MEDICATIONS</p>
        </div>

        <div class="first-row row">
            <div class="col-md-12">
                <div class="text-center">
                    <h2 class="title">
                        @{{ dataMedication.generic_name  }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="desc-row row">
            <div class="col-md-12">
                <h5 class="med-title">Conditions treated</h5>
                <p class="med-desc">
                    @{{ dataMedication.condition }}
                </p>
            </div>
        </div>

        <div class="se-row row">
            <div class="col-md-12">
                <h5 class="med-title-dark">Side effects</h5>
                <div class="row">
                    <div class="col-md-12" v-if="effects.length" v-for="(effects, desc) in dataMedication.side_effects">
                        <h6>@{{ titleCase(desc) }}</h6>
                        <ul>
                            <li v-for="effect in effects" class="col-md-6">
                                @{{ effect }}
                            </li>
                        </ul>
                    </div>
                </div>
                <h5 class="med-title-dark">Common Brand Names</h5>
                <div class="row">
                    <ul>
                        <li v-for="brand in dataMedication.branded_medications">
                            @{{ brand.brand_name }}
                        </li>
                    </ul>
                </div>

                <div class="row">
                    <hr>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <p class="disclaimer">
                                <a href="">Click here for the American Society of Health-System Pharmacists, Inc</a>. Disclaimer. ASHP® Consumer Medication Information. © Copyright, 2014. <br>
                                The American Society of Health-System Pharmacists, Inc., 7272 Wisconsin Avenue, Bethesda, Maryland. <br>
                                All Rights Reserved. Duplication for commercial
                                use must be authorized by ASHP.
                            </p>
                            <div class="clear"></div>
                            <button type="button" class="btn btn-info">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> BUY NOW
                            </button>
                            <button type="button" class="btn btn-info" @click="bookmark('medication',dataMedication.id, $event.target)">
                                <i class="fa fa-bookmark" aria-hidden="true"></i> <span>SAVE TO YOUR PROFILE</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
