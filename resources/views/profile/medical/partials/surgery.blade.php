
<div slot="view-body" class="view-form">
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Had a surgery:</label>
        </div>
        <div class="col-md-9">
             No
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Type of surgery:</label>
        </div>
        <div class="col-md-9">
            No
        </div>
    </div>
</div>

<div slot="edit-body" class="edit-form">
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Have you had any surgeries done? (If yes, what type of surgery?)</label>
        </div>
        <div class="col-md-9">
            <select-default match-value="Yes" classes="form-control input-sm"  :options="defaults.yesno" >
                <input placeholder type="text" class="form-control input-sm">
            </select-default>
        </div>
    </div>
    
</div>
