
<div slot="view-body" class="view-form">
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Allergic to any medications:</label>
        </div>
        <div class="col-md-9">
             No
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Other Allergies:</label>
        </div>
        <div class="col-md-9">
            No
        </div>
    </div>
</div>

<div slot="edit-body" class="edit-form">
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Are you allergic to any medications? (If Yes, which medication and reaction?)</label>
        </div>
        <div class="col-md-9">
            <select-default match-value="Yes" classes="form-control input-xs"  :options="['Yes','No','Not Sure']" >
                <input slot="matched-element" placeholder type="text" class="form-control input-xs">
            </select-default>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Do you have any other allergies? (If Yes, to what and what reaction?)</label>
        </div>
        <div class="col-md-9">
            <select-default match-value="Yes" classes="form-control input-xs"  :options="['Yes','No','Not Sure']" >
                <input slot="matched-element" placeholder type="text" class="form-control input-xs">
            </select-default>
        </div>
    </div>
</div>
