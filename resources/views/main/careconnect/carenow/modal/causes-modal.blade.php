<!-- Modal -->

<div class="modal fade" v-if="dataSymptom" id="causes" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-pl" role="document">
    <button type="button" class="btn btn-default close-btn" data-dismiss="modal">&#215;</button>
    <div class="modal-content">
        <!-- <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div> -->
        <div class="modal-body body-content">
            <div class="clear"></div>

            <div class="modal-div-title row">
                <p>Symptom</p>
            </div>


            <p class="modal-search-title">@{{ dataSymptom.name }}</p>
            <h4><strong>Possible Conditions</strong></h4>
            <ul>
                <li v-for="condition in dataSymptom.possible_conditions">
                    <p class="modal-content-p">@{{ condition.name }}</p>
                </li>
            </ul>

        </div>
    </div>
  </div>
</div>
