
<div slot="view-body" class="view-form">
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Physically hurt by someone:</label>
        </div>
        <div class="col-md-9">
             No
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Forced to have sexual activities:</label>
        </div>
        <div class="col-md-9">
            No
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Verbally or emotionally abused by someone:</label>
        </div>
        <div class="col-md-9">
            No
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Abuse counselling:</label>
        </div>
        <div class="col-md-9">
            No
        </div>
    </div>
</div>

<div slot="edit-body" class="edit-form">
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Within the last year, have you been hit, slapped, kicked or physically hurt by someone?</label>
        </div>
        <div class="col-md-9">
            <select-default match-value="Yes" classes="form-control input-sm"  :options="defaults.yesno" >
            </select-default>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Within the last year, has anyone ever forced you to have sexual activities?</label>
        </div>
        <div class="col-md-9">
            <select-default match-value="Yes" classes="form-control input-sm"  :options="defaults.yesno" >
            </select-default>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Do you feel you are verbally or emotionally abused by someone?</label>
        </div>
        <div class="col-md-9">
            <select-default match-value="Yes" classes="form-control input-sm"  :options="defaults.yesno" >
            </select-default>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Have you had counseling for these issues?</label>
        </div>
        <div class="col-md-9">
            <select-default match-value="Yes" classes="form-control input-sm"  :options="defaults.yesno" >
            </select-default>
        </div>
    </div>


</div>
