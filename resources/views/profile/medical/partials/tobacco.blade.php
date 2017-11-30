
<div slot="view-body" class="view-form">
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Currently smoking cigarretes: </label>
        </div>
        <div class="col-md-9">
             No
        </div>
    </div>
     <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Sticks per day: </label>
        </div>
        <div class="col-md-9">
            No
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Smoking since: </label>
        </div>
        <div class="col-md-9">
            No
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Feel about quitting smoking:</label>
        </div>
        <div class="col-md-9">
            No
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Smoking cigarretes(before):</label>
        </div>
        <div class="col-md-9">
            No
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Smoking since(before):</label>
        </div>
        <div class="col-md-9">
            No
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Sticks per day: </label>
        </div>
        <div class="col-md-9">
            No
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Quit smoking since: </label>
        </div>
        <div class="col-md-9">
            No
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Used other type of tobacco:</label>
        </div>
        <div class="col-md-9">
            No
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Other type of tobacco:</label>
        </div>
        <div class="col-md-9">
            No
        </div>
    </div>
</div>

<div slot="edit-body" class="edit-form">
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Do you currently smoke cigarettes? (If yes, how many sticks per day?)</label>
        </div>
        <div class="col-md-9">
            <select-default match-value="Yes" classes="form-control input-sm"  :options="defaults.yesno" >
                <input placeholder type="text" class="form-control input-sm">
            </select-default>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>What age did you start smoking?</label>
        </div>
        <div class="col-md-9">
           <input type="text" class="form-control" name=""></ins>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>How do you feel about quitting smoking?</label>
        </div>
        <div class="col-md-9">
            <input type="text" class="form-control" name="">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>If you do not currently smoke cigarettes, have you ever smoked? (If yes when did you start?)</label>
        </div>
        <div class="col-md-9">
            <select-default match-value="Yes" classes="form-control input-sm"  :options="defaults.yesnonotsure" >
                <input placeholder type="text" class="form-control input-sm">
            </select-default>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>How many per day?</label>
        </div>
        <div class="col-md-9">
            <input type="text" class="form-control" name=""> 
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>When did you stop?</label>
        </div>
        <div class="col-md-9">
            <input type="text" class="form-control" name="">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Do you use any other type of tobacco? (If yes, what?)</label>
        </div>
        <div class="col-md-9">
            <select-default match-value="Yes" classes="form-control input-sm"  :options="defaults.yesno" >
                <input placeholder type="text" class="form-control input-sm">
            </select-default>
        </div>
    </div>
  
</div>
