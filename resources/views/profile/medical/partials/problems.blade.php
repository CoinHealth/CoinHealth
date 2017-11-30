<div slot="view-body" class="view-form">
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Conditions:</label>
        </div>
        <div class="col-md-9">

        </div>
    </div>
</div>

<div slot="edit-body" class="edit-form">
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Please check if you have had problems with::</label>
        </div>
        <div class="col-md-9">
            <check-button
                key="problem"
                v-for="problem in defaults.medical_problems"
                :checked="false"
                classes="btn btn-default btn-xs"
                active-class="btn-info">
                    <span slot="text">@{{ problem }}</span>
            </check-button>
        </div>
    </div>
</div>
