
<div slot="view-body" class="view-form">
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Current major stressors or life changes in your life:</label>
        </div>
        <div class="col-md-9">
             No
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Major changes in family health:</label>
        </div>
        <div class="col-md-9">
            No
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Handle stress:</label>
        </div>
        <div class="col-md-9">
            No
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Activities to relax:</label>
        </div>
        <div class="col-md-9">
            No
        </div>
    </div>
   
</div>

<div slot="edit-body" class="edit-form">
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>What are the current major stressors or life changes in your life?</label>
        </div>
        <div class="col-md-9">
            <input type="text" class="form-control" name="">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Any major changes in the family health during the past year? (If yes, please explain)</label>
        </div>
        <div class="col-md-9">
            <select-default match-value="Yes" classes="form-control input-sm"  :options="defaults.yesnonotsure" >
                <input placeholder type="text" class="form-control input-sm">
            </select-default>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>How do you handle stress?</label>
        </div>
        <div class="col-md-9">
            <select-default match-value="Yes" classes="form-control input-sm"  :options="defaults.handle_stress" >
            </select-default>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>What do you do to relax?</label>
        </div>
        <div class="col-md-9">
            <input type="text" class="form-control" name="">
        </div>
    </div>
</div>
