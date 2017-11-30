<!-- Modal -->

<div class="modal fade" v-if="dataCondition" id="conditions" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-pl" role="document">
        <button type="button" class="btn btn-default close-btn" data-dismiss="modal">&#215;</button>
        <div class="modal-content">
            <div class="modal-body body-content">

                <div class="modal-div-title row">
                    <p>CONDITION</p>
                </div>


                <h2 class="modal-search-title">
                    @{{ dataCondition.name }}
                </h2>
                <p class="modal-content-p">
                    @{{ dataCondition.description }}
                </p>
                <h5>
                    <strong>Possible Symptoms</strong>
                </h5>
                <p class="modal-content-p">
                    @{{ dataCondition.symptoms }}
                </p>
                <h5>
                    <strong>Workup</strong>
                </h5>
                <p class="modal-content-p">
                    @{{ dataCondition.tests.workup }}
                </p>

            </div>
        </div>
    </div>
</div>
