
<div slot="view-body" class="view-form">
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Drink alcohol:</label>
        </div>
        <div class="col-md-9">
             No
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Glasses a week:</label>
        </div>
        <div class="col-md-9">
            No
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Drink alcohol in the morning:</label>
        </div>
        <div class="col-md-9">
            No
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Cut down drinking:</label>
        </div>
        <div class="col-md-9">
            No
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Felt guilty on drinking:</label>
        </div>
        <div class="col-md-9">
            No
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Alcoholic:</label>
        </div>
        <div class="col-md-9">
            No
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Illegal drugs:</label>
        </div>
        <div class="col-md-9">
            No
        </div>
    </div>
</div>

<div slot="edit-body" class="edit-form">
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Do you drink alcohol? (If yes, how many drinks do you have each week?)</label>
        </div>
        <div class="col-md-9">
            <select-default match-value="Yes" classes="form-control input-sm"  :options="defaults.yesno" >
                <input placeholder type="text" class="form-control input-sm">
            </select-default>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Do you ever have a drink in the morning to get you going?</label>
        </div>
        <div class="col-md-9">
            <select-default match-value="Yes" classes="form-control input-sm"  :options="defaults.yesno" >
            </select-default>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Have you ever tried to cut down on your drinking?</label>
        </div>
        <div class="col-md-9">
            <select-default match-value="Yes" classes="form-control input-sm"  :options="defaults.yesno" >
            </select-default>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Have you ever felt guilty about the amount you drink?</label>
        </div>
        <div class="col-md-9">
            <select-default match-value="Yes" classes="form-control input-sm"  :options="defaults.yesno" >
            </select-default>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Have you ever been an alcoholic?</label>
        </div>
        <div class="col-md-9">
            <select-default match-value="Yes" classes="form-control input-sm"  :options="defaults.yesno" >
            </select-default>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Do you use illegal drugs?</label>
        </div>
        <div class="col-md-9">
            <select-default match-value="Yes" classes="form-control input-sm"  :options="defaults.yesno" >
            </select-default>
        </div>
    </div>


</div>
